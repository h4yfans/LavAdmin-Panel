<?php

namespace App\Http\Controllers;

use App\Element;
use App\ElementContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class TopicController extends Controller
{
    public function getAddElementTopicAction($id)
    {
        $element = Element::find($id);

        return view('admin.add_element_topic')
            ->with(['element' => $element,]);
    }

    public function postAddElementTopicAction($id, Request $request)
    {
        $this->validate($request, [
            'topic_title' => 'required',
            'topic_body'  => 'required'
        ]);

        $element = Element::find($id);

        $filename = '';
        if ($element->isPhoto) {
            if (Input::hasFile('file')) {
                $file     = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            }
        }
        $category_id = Input::get('selectedCategory');

        $elementTopic             = new ElementContext();
        $elementTopic->title      = $request['topic_title'];
        $elementTopic->body       = $request['topic_body'];
        $elementTopic->image_path = $filename;
        if ($element->isCategory) {
            $elementTopic->category_id = $category_id ?: 0;
        }
        $element->elementcontext()->save($elementTopic);

        return redirect()->route('admin.getallelementtopic', ['id' => $id]);
    }

    public function getAllElementTopicAction($id)
    {
        $element = Element::find($id);

        return view('admin.all_element_topic')
            ->with([
                'element' => $element
            ]);
    }

    public function postDeleteElementTopicAction($id)
    {
        $topic = ElementContext::find($id);
        $topic->delete();

        return redirect()->back();
    }

    public function getEditElementTopicAction($id)
    {
        $topic = ElementContext::find($id);

        return view('admin.edit_element_topic')
            ->with([
                'topic' => $topic,
            ]);
    }

    public function postEditElementTopicAction($topic_id, Request $request)
    {
        $this->validate($request, [
            'topic_title' => 'required',
            'topic_body'  => 'required'
        ]);

        $filename = '';
        if (Input::hasFile('file')) {
            $file     = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save(public_path('/uploads/' . $filename));
        }

        $category_id = Input::get('selectedCategory');

        $topic        = ElementContext::find($topic_id);

        $topic->title = $request['topic_title'];
        $topic->body  = $request['topic_body'];
        $topic->element->isCategory ? $topic->category_id = $category_id : 0;
        $topic->image_path = $filename;

        $topic->save();

        return redirect()->back();
    }
}
