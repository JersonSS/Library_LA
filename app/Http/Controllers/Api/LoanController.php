<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoanCollection;
use App\Models\BookCopie;
use App\Models\BookStatus;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:Loan.all');
    }
    public function index()
    {
        return new LoanCollection(Loan::with(['user'])->get());
    }
    public function all()
    {

        return Loan::all();
    }
    public function create(Request $request)
    {

        Loan::create([
            'book_copies_id' => $request->book_copies_id,
            'user_id' => $request->user_id,
            'librarian_id' => $request->librarian_id,
            'loan_at' => $request->loan_at,
            'return_at' => $request->return_at
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Loan::find($id);
        $role->update([
            'book_copies_id' => $request->input('book_copies_id'),
            'user_id' => $request->input('user_id'),
            'librarian_id' => $request->input('librarian_id'),
            'loan_at' => $request->input('loan_at'),
            'return_at' => $request->input('return_at'),
        ]);

        return response()->json(['message' => 'El Usuario a sido actualizado correctamente'], 201);
    }


    public function newLoanStatus(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'book_copies_id' => 'required|exists:book_copies,id',
            'user_id' => 'required|exists:users,id',
            'return_at' => 'required|date',
        ]);

        // Nuevo préstamo más el cambio de estado automático
        $loan = Loan::create([
            'book_copies_id' => $request->book_copies_id,
            'user_id' => $request->user_id,
            'librarian_id' => $request->librarian_id,
            'loan_at' => now(), // Capturar la zona horaria actual
            'return_at' => $request->return_at,
        ]);

        // Cambiar el estado del ejemplar a "Reservado"
        $bookCopy = BookCopie::findOrFail($request->book_copies_id);
        $reservedStatus = BookStatus::where('name', 'Reservado')->first();

        if ($bookCopy && $reservedStatus) {
            $bookCopy->status_id = $reservedStatus->id;
            $bookCopy->save();
        }

        return response()->json($loan, 201);
    }

    public function deleteLoan($id)
    {

        $loan = Loan::findOrFail($id); // para encontrar el prestamo y dar el fallo asociado si no lo encuentra

        // Tener la copia que esta relacion al prestamo
        $bookCopy = $loan->bookCopie;

        // verificar la existencia del prestamo y la copia del libro
        if ($loan && $bookCopy) {

            $loan->delete();

            //  Tener el estado a disponible
            $availableStatus = BookStatus::where('name', 'Disponible')->first();

            // Cambiar el estado de la copia de libro a "Disponible"
            if ($availableStatus) {
                $bookCopy->status_id = $availableStatus->id;
                //guardar el cambio entre las tablas
                $bookCopy->save();

                return response()->json(['message' => 'Préstamo eliminado y estado de libro actualizado'], 200);
            }
        }

        return response()->json(['message' => 'No se pudo encontrar el préstamo o la copia de libro'], 404);
    }
}
