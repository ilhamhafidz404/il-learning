<?php

namespace App\Http\Controllers\more;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use App\Models\Submitsubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // ambil data submit Submission-nya
        $subSub = Submitsubmission::find($id);
        // hapus storage/file yang user upload untuk submission ini
        Storage::delete($subSub->file);
        // hapus data di tabel submit submissionnya
        $subSub->delete();

        // ambil data progres
        $progress = Progress::whereUserId(Auth::user()->id)->whereMissionId($subSub->submission->mission->id)->first();
        $progress->update([
            'progress' => $progress->progress - 1
        ]);

        if ($progress->progress == 0) {
            $progress->delete();
        }

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Berhasil Menghapus Submit Submission',
            'message' => 'Silahkan Upload lagi tugas yang benar'
        ]);
    }
}
