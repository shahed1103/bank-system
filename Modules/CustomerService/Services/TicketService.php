<?php

namespace Modules\CustomerService\Services;
use Modules\CustomerService\Models\Ticket;
use Modules\CustomerService\Models\TicketMessage;
use Exception;

class TicketService
{
    public function createTicket($request): array{
        $ticket = Ticket::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'status_id' => 1,
        ]);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $ticket->user_id,
            'message' => $request->message,
        ]);
        $message = ' Ticket created successfully';
        return['ticket' => $ticket , 'message' => $message];
    }

    public function getUserTickets(): array{
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        $message = 'All tickets are retrived successfully';
        return ['tickets' => $tickets , 'message' => $message];
    }

    public function getTicketDetails($ticketId): array{
        $ticket = Ticket::with('messages.sender')->findOrFail($ticketId);
        $message = 'ticket details are retrived successfully';
        return ['ticket' => $ticket , 'message' => $message];
    }

    public function reply($request , $ticketId): array{
        $ticket = Ticket::findOrFail($ticketId);

        if ($ticket->status->status === 'closed') {
            throw new Exception('Ticket is closed' , 400);
        }

        $reply = TicketMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => Auth::user()->id,
            'message' => $request->message,
        ]);
        $message = 'ticket reply are created successfully';
        return ['ticket' => $reply , 'message' => $message];
    }

    public function changeStatus($request , $ticketId): array{
       $ticketChange =  Ticket::where('id', $ticketId)->update([
            'status_id' => $request->status_id,
        ]);

        $message = 'ticket status are changed successfully';
        return ['ticket' => $ticketChange , 'message' => $message];
    }
}
