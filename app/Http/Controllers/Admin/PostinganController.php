<?php

    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Postingan;
    use App\Models\Ulasan;
    use App\Models\User;
    use Illuminate\Support\Facades\Validator;
    use RealRashid\SweetAlert\Facades\Alert;
    use Illuminate\Support\Facades\Auth;
    
    class PostinganController extends Controller
    {
    
     public function index()
     {
         // Filter hanya yang statusnya 'disetujui'
         $postingan = Postingan::where('status', 'disetujui')
                               ->whereNotNull('status')  // Memastikan status tidak null
                               ->get();
        $ulasan = $postingan->ulasan; // Menampilkan semua ulasan yang terkait dengan produk

     
         return view('pages.user.postingan.index', compact('postingan','ulasan'));
     }
     

        // Form untuk membuat postingan baru
        public function create()
        {
            return view('pages.user.postingan.create');
        }
    
        // Menyimpan postingan baru ke database
        public function store(Request $request)
        {
            $user = Auth::user(); // Mendapatkan pengguna yang sedang login
            $userId = $user->id; // Mendapatkan ID pengguna
            $username = $user->name; // Mendapatkan username pengguna
        
            // Validasi input
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'numeric',
                'category' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:png,jpeg,jpg|max:2048', // Maksimal 2MB
                'lokasi' => 'required',
                'status' => 'required',
            ]);
        
            // Jika validasi gagal
            if ($validator->fails()) {
                Alert::error('Gagal!', 'Pastikan semua input terisi dengan benar!');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            // Penanganan file gambar
            try {
                $imageName = null;
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images'), $imageName);
                }
        
                // Simpan data ke database dengan menambahkan user_id dan username
                Postingan::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'category' => $request->category,
                    'description' => $request->description,
                    'image' => $imageName,
                    'lokasi' => $request->lokasi,
                    'user_id' => $userId,  // Menyimpan ID pengguna
                    'username' => $username,
                    'status' => $request->status, // Menyimpan username pengguna
                ]);
        
                Alert::success('Berhasil!', 'Produk berhasil ditambahkan!');
                return redirect()->route('user.postingan.index');
            } catch (\Exception $e) {
                Alert::error('Gagal!', 'Terjadi kesalahan saat menyimpan data!');
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        }

   
      
    }
    

