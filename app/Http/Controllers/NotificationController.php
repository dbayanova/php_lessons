<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\TemplateController;
use App\Models\Template;

class NotificationController extends Controller
{
    public function create(Request $request)
    {
        $notification = new Notification();
        $notification->theme = $request->theme;
        $notification->recipient = $request->recipient;
        $notification->template_id = $request->template_id;
        $notification->save();
        return $notification;
    }

    public function delete(Request $request)
    {
        $notification = new Notification();
        if ($notification->id == $request->id)
        {
            $notification->delete();
        }
        else
        {
            throw new NotFoundException('Мы не нашли шаблон по вашему запросу.');
        }
        $notification->save();
    }

    public function update(Request $request)
    {
        $notification = new Notification();
        if ($notification->id == $request->id)
        {
            $notification->theme = $request->theme;
            $notification->recipient = $request->recipient;
            $notification->template_id = $request->template_id;
        }
        else
        {
            throw new NotFoundException('Мы не нашли шаблон по вашему запросу.');
        }
        $notification->save();
    }

    public function list(Request $request)
    {
        $notification = Notification::get();
        return $notification;
    }

    public function item(Request $request, $id)
    {
        $notification = Notification::find($id);
        if ($notification->id == $id)
        {
            return $notification;
        }
        else
        {
            throw new NotFoundException('Мы не нашли шаблон по вашему запросу.');
        }
    }

    public function sendEmail(Request $request, $id)
    {
        $sender = $request->sender;
        $name = $request->name;
        $recipient = 'danes0407@gmail.com';
        $message = Template::where('id', '=', $id)->first();
        foreach(str_split($message->text) as $symbol)
        {
            if($symbol == '!' or $symbol == '.')
            {
                $message->text = str_replace($symbol, ", $name!", $message->text);
            }
        }
        Mail::to($recipient)->send(new Email($message));
        return str_replace('_', $sender, 'сообщение отправлено от: _');
    }
}
