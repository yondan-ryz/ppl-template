<?php

namespace App\Http\Controllers;

use App\Models\Sma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmaController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $smas = Sma::all();
        $smasActives = Sma::all()->where('makelogo', '=', "yes")->take(1);;
        $logos = Sma::all()->where('makelogo', '=', "yes")->take(1);
        // dd($posts);

        //render view with posts
        return view('about.index', compact('smasActives','smas', 'logos'));
    }
    public function changelogo(Request $request, Sma $post)
    {
//        $r = $request->file('logo');
        $ty = new Sma();
        $ty->nama = $request->nama;

        dd($ty);
//        $post->update([
//            'makelogo' => 'no',
//        ]);
//        return redirect()->route('sma.index')
//            ->with('success','Product updated successfully');
    }
//    public function skedit()
//    {
//        $posts = Sma::all();
////        dd($posts);
//        return view('about.edit', compact('posts'));
//    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'logo' => 'image',
            'visi' => 'required',
            'misi' => 'required',
            'alamat' => 'required',
            'sejarah' => 'required',
            'makelogo' => 'required',
        ]);

        //upload image
        $image = $request->file('logo');
        $image->storeAs('public/images', $image->hashName());

        //create post
        Sma::create([
            'nama' => $request->nama,
            'logo' => $image->hashName(),
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'sejarah' => $request->sejarah,
            'makelogo' => $request->makelogo,
        ]);

        //redirect to index
        return redirect()->route('sma.index')->with(['success' => 'Data Berhasil Disimpan!, Jika terdapat dua data maka data pertama yang akan ditampilkan.']);
    }

    /**
     * edit
     *
     * @param mixed $post
     * @return void
     */
    public function edit()
    {
        $posts = Sma::all();
//        dd($posts);
        return view('about.edit', compact('posts'));
    }

    /**
     * update
     *
     * @param mixed $request
     * @param mixed $post
     * @return void
     */
    public function update(Request $request, Sma $post)
    {
        $update = $request->validate([
            'nama' => 'required',
            'logo' => 'image',
            'visi' => 'required',
            'misi' => 'required',
            'alamat' => 'required',
            'sejarah' => 'required',
        ]);

//       Sma::create($update);
        //check if image is uploaded
        if ($request->hasFile('logo')) {

            //upload new image
            $image = $request->file('logo');
            $image->storeAs('public/images', $image->hashName());

            //delete old image
            Storage::delete('public/images' . $post->logo);

            //update post with new image
            $post->update([
                'nama' => $request->nama,
                'logo' => $image->hashName(),
                'visi' => $request->visi,
                'misi' => $request->misi,
                'alamat' => $request->alamat,
                'sejarah' => $request->sejarah,
            ]);

        } else {

            //update post without image
            $post->update([
                'nama' => $request->nama,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'alamat' => $request->alamat,
                'sejarah' => $request->sejarah,
            ]);
        }

        //redirect to index
        return redirect()->route('sma.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param mixed $post
     * @return void
     */
    public function destroy(Sma $post, $id)
    {
        //delete image
        Storage::delete('public/posts/' . $post->image);

        //delete post
        $post->destroy($id);

        //redirect to index
        return redirect()->route('sk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
