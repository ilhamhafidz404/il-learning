<?php

namespace App\Http\Controllers\more;

use App\Http\Controllers\Controller;
use App\Models\Submitsubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteSubmitSubmission extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $subSub = Submitsubmission::find($id);
        Storage::delete($subSub->file);
        $subSub->delete();

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menghapus Submit Submission',
            'message' => 'Silahkan Upload lagi tugas yang benar'
        ]);
    }
}
