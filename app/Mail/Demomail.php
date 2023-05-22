<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Demomail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //Tạo thuộc tính data nhận dữ liệu được truyền đi
    public $data;
    //Phương thức khỏi tạo đầu tiên khi gửi mail đi
    public function __construct($data)
    {
        //Nạp dữ liệu cho thuộc tính data
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.demo')
            //Tên và email người gửi
            ->from('htinh7444@gmail', 'Quantinh')
            //Tiêu đề thư gửi
            ->subject('[store] Thư xác nhận nhận đơn hàng #268')
            //Tiêu đề và nội dung trong thư gửi
            ->with($this->data);
    }
}
