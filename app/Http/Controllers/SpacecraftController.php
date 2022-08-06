<?php

namespace App\Http\Controllers;

use App\Spacecraft;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SpacecraftController extends Controller
{

    public function index(Request $request)
    {


        $query = Spacecraft::select('id', 'name', 'status');

        if ($request->has('name')) {
            $ids = explode(",", $request->get('name'));
            $query = $query->whereIn('name', $ids);
        }

        if ($request->has('class')) {
            $ids = explode(",", $request->get('class'));
            $query = $query->whereIn('class', $ids);
        }

        if ($request->has('status')) {
            $ids = explode(",", $request->get('status'));
            $query = $query->whereIn('status', $ids);
        }

        $spacecrafts = $query->get();

        return $this->sendResponse($spacecrafts);
    }

    public function ShowOneSpaceCraft($id)
    {
        return $this->sendResponse(Spacecraft::with('armament')->find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'class' => 'required',
            'crew' => 'required',
            'image' => 'required',
            'value' => 'required',
            'status' => 'required',
        ]);

        //get posted image and save to public path
        if (isset($request->image)) {
            $image = $request->image;
            $imageName = str_random(20) . '.' . 'png';
            File::put(public_path() . '/spacecrafts/' . $imageName, base64_decode($image));
        }

        $spacecraft = new Spacecraft();

        return $this->spacecraft_addition_update($request, $spacecraft, $imageName);

    }

    public function update($id, Request $request)
    {
        $spacecraft = Spacecraft::find($id);

        $this->validate($request, [
            'name' => 'required',
            'class' => 'required',
            'crew' => 'required',
            'image' => 'required',
            'value' => 'required',
            'status' => 'required',
        ]);
        if (isset($request->image)) {
            $image = $request->image;
            $imageName = str_random(20) . '.' . 'png';
            File::put(public_path() . '/spacecrafts/' . $imageName, base64_decode($image));
        }

        return $this->spacecraft_addition_update($request, $spacecraft, $imageName);

    }

    public function delete($id)
    {
        Spacecraft::findOrFail($id)->delete();
        return $this->sendConfirmationResponse(true);
    }

    private function spacecraft_addition_update(Request $request, $spacecraft, string $imageName): \Illuminate\Http\JsonResponse
    {
        $spacecraft->name = $request->name;
        $spacecraft->class = $request->class;
        $spacecraft->crew = $request->crew;
        $spacecraft->image = $imageName;
        $spacecraft->value = $request->value;
        $spacecraft->status = $request->status;

        if ($spacecraft->save()) {
            return $this->sendConfirmationResponse(true);
        } else {
            return $this->sendConfirmationResponse(false);
        }
    }
}
