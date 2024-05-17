<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EditController extends Controller
{
    private ?Request $request = null;

    public function index($number)
    {
        $priorities = Priority::all();
        $ticket = Ticket::getByNumber($number);

        if (!$ticket) {
            throw new \InvalidArgumentException('Ticket not found');
        }

        return view('editTicket', [
            'number' => $number,
            'priorities' => $priorities,
            'ticket' => $ticket,
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function save(Request $request)
    {
        $this->request = $request;

        try {
            $data = $this->validateRequest();
            $ticket = Ticket::getByNumber($data['number']);

            if (!$ticket) {
                throw new \InvalidArgumentException('Ticket not found');
            }

            $ticket->update($data);

            return response()->json([
                'data' => ['number' => 'AQ-' . $ticket->id]
            ], 201);
        }catch (ValidationException $e){
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

    }

    private function validateRequest(): array
    {
        $data = $this->request->validate([
            'number' => 'required',
            'title' => 'required|max:255',
            'description' => 'nullable|string|max:1000',
            'priority_id' => 'required|numeric',
        ]);

        if ($data['description'] === null) {
            $data['description'] = '';
        }

        return $data;
    }
}
