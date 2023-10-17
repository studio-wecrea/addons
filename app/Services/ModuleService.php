<?php

namespace App\Services;

use App\Models\License;
use App\Models\Media;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleService 

{

public function getMedias($id_module) 
{
    return Media::where('id_module', $id_module)->first();
}

public function getLicense($id)
{
    $license = Module::find($id)->license;
    // $module = Module::find($id)->with('license');
    // $license = $module->license;

    return $license;
}

public function createNewLicense(Request $request, $id)
{
    $module = Module::find($id);
    $license = new License();
    $formdata = $request->all();
    $formdata['id_license'] = $license;
    $license->fill($formdata);
    $module->license->save();

    return $license;
}

public function getNumberOfDownloads()
{
    //
}

public function getNumberOfActiveInstallations()
{
    //
}


}

