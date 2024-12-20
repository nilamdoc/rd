<?php
// app/Mail/OrderPlaced.php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class OrderPlaced extends Mailable
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('emails.order_placed')
            ->subject('Your Order Has Been Placed')
            ->with([
                'order' => $this->order,
            ]);
    }
}
?>