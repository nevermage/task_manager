<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CreateController extends Controller
{
    private ?Request $request = null;

    public function index()
    {
        $priorities = Priority::all();
        return view('createTicket', ['priorities' => $priorities]);
    }

    /**
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $this->request = $request;

        try {
            $data = $this->validateRequest();
            $ticket = Ticket::create($data);

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
            'project_id' => 'required|numeric',
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
