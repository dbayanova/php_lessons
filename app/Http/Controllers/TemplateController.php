<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Exceptions\NotFoundException;


class TemplateController extends Controller
{
    public function create(Request $request)
    {
        $template = new Template();
        $template->name = $request->name;
        $template->text = $request->text;
        $template->save();
        return 'Вы создали шаблон';
    }

    public function update(Request $request, $id)
    {
        $template = Template::find($id);
        if ($id == $template->id)
        {
            $template->name = $request->name;
            $template->text = $request->text;
            
        }
        else
        {
            throw new NotFoundException('Мы не нашли шаблон по вашему запросу.');
        }
        $template->save(); 
        return 'Шаблон был отредактирован';

    }

    public function delete(Request $request, $id)
    {
        $template = Template::find($id);
        if ($template->id == $id)
        {
            $template->delete();
            return "Шаблон был удалён";
        }
        else
        {
            throw new NotFoundException('Мы не нашли шаблон по вашему запросу.');

        }
        $template->save();
        return $template;
    }



    public function list(Request $request)
    {
        $templates = Template::get();
        return $templates;
    }

    public function item(Request $request, $id)
    {
        $template = Template::find($id);
        if ($template->id == $id)
        {
            return $template;
        }
        else
        {
            throw new NotFoundException('Мы не нашли шаблон по вашему запросу.');
        }
    }
}
