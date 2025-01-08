namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private $viewPrefix;

    public function __construct()
    {
        $this->middleware('role:admin,operator');
        $this->viewPrefix = auth()->user()->role === 'admin' ? 'admin' : 'operator';
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view("{$this->viewPrefix}.mahasiswa.index", compact('mahasiswas'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view("{$this->viewPrefix}.mahasiswa.create", compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan_id' => 'required|exists:jurusans,id',
            'no_hp' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->save();

        return redirect()->route("{$this->viewPrefix}.mahasiswa.index")->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view("{$this->viewPrefix}.mahasiswa.show", compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusans = Jurusan::all();

        return view("{$this->viewPrefix}.mahasiswa.edit", compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'jurusan_id' => 'required|exists:jurusans,id',
            'no_hp' => 'required|string|max:15',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validatedData);

        return redirect()->route("{$this->viewPrefix}.mahasiswa.index")->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route("{$this->viewPrefix}.mahasiswa.index")->with('success', 'Data berhasil dihapus');
    }
}
