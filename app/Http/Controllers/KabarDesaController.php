<?php

namespace App\Http\Controllers;

use App\Models\SDGs;
use App\Models\Wilayah;
use App\Models\Broadcast;
use App\Models\Kependudukan;
use Illuminate\Http\Request;
use App\Models\post_komentar;
use App\Models\AnggaranTransaksi;
use App\Http\Controllers\Controller;

class KabarDesaController extends Controller
{
    public function index()
    {
        $post_komentar = post_komentar::orderBy('tanggal_post', 'desc')->get();
        $broadcast = Broadcast::latest()->first();

        return view('kabar-desa', compact('post_komentar', 'broadcast'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Menyimpan komentar ke database
        post_komentar::create([
            'komentar' => $request->comment,
            'tanggal_post' => now(),
        ]);

        // Redirect kembali ke halaman kabar desa dengan pesan sukses
        return redirect()->route('kabar-desa')->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function storeBroadcast(Request $request)
    {
        $request->validate([
            'isi_broadcast' => 'required|string',
        ]);

        Broadcast::create([
            'isi_broadcast' => $request->input('isi_broadcast'),
            'status' => 'unread',
        ]);

        return redirect()->back()->with('success', 'Broadcast berhasil dikirim.');
    }

    public function indexInformasi()
    {
        //Kependudukan Controller
        $kependudukan = Kependudukan::all();
        $jumlahPenduduk = Kependudukan::count(); // Menghitung jumlah kependudukan
        // Menghitung jumlah penduduk per wilayah
        $wilayahCount = $kependudukan->groupBy('wilayah_id')->map->count();
        // Ambil data wilayah dan gabungkan dengan jumlah penduduk
        $wilayahData = Wilayah::all()->map(function ($wilayah) use ($wilayahCount) {
            return [
                'id' => $wilayah->id,
                'nama_wilayah' => $wilayah->nama_wilayah,
                // 'jumlah_penduduk' => $wilayahCount[$wilayah->id] ?? 0
            ];
        });

        $geojson = '{"type":"FeatureCollection","name":"bantul-banguntapan-jambidan-","crs":{"type":"name","properties":{"name":"urn:ogc:def:crs:OGC:1.3:CRS84"}},"features":[{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":120,"pedukuhan":"Ponegaran"},"geometry":{"type":"Polygon","coordinates":[[[110.42774059,-7.845928],[110.42766535,-7.84616136],[110.42740005,-7.84711828],[110.42735132,-7.84764473],[110.42763844,-7.84829128],[110.42806945,-7.84900983],[110.42832801,-7.849316],[110.421257,-7.856264],[110.419481,-7.856722],[110.419095,-7.854021],[110.42687742,-7.84575859],[110.42717236,-7.84581129],[110.42731913,-7.84584144],[110.42774059,-7.845928]]]}},{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":67,"pedukuhan":"Bintaran"},"geometry":{"type":"Polygon","coordinates":[[[110.42552522,-7.85727143],[110.42491322,-7.85793219],[110.42387982,-7.85893592],[110.42311122,-7.85936565],[110.42299731,-7.85968232],[110.42265433,-7.86001118],[110.42183746,-7.86063229],[110.42124687,-7.86110209],[110.42111665,-7.86120567],[110.4210919,-7.86133227],[110.42097162,-7.86194736],[110.42083104,-7.86276976],[110.41977067,-7.8626158],[110.41821105,-7.86232646],[110.41745281,-7.86212099],[110.419481,-7.856722],[110.421257,-7.856264],[110.42552522,-7.85727143]]]}},{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":245,"pedukuhan":"Joho"},"geometry":{"type":"Polygon","coordinates":[[[110.41968226,-7.84450685],[110.42088485,-7.84475747],[110.42338634,-7.84516551],[110.42565121,-7.84553949],[110.42687742,-7.84575859],[110.419095,-7.854021],[110.413687,-7.851564],[110.412858,-7.849813],[110.41968226,-7.84450685]]]}},{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":178,"pedukuhan":"Dhuku"},"geometry":{"type":"Polygon","coordinates":[[[110.41338956,-7.86103306],[110.41326889,-7.86095546],[110.41240505,-7.8608346],[110.41180578,-7.86030725],[110.41101415,-7.86004289],[110.40979037,-7.85987365],[110.408927,-7.85972891],[110.408927,-7.85972497],[110.40941276,-7.85534997],[110.4096806,-7.85371053],[110.41009086,-7.85050803],[110.41022144,-7.84927978],[110.412858,-7.849813],[110.413687,-7.851564],[110.41338956,-7.86103306]]]}},{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":154,"pedukuhan":"Kretek"},"geometry":{"type":"Polygon","coordinates":[[[110.41022144,-7.84927978],[110.41033245,-7.84823555],[110.41080951,-7.84440633],[110.41102413,-7.84289187],[110.41270446,-7.84333004],[110.41277142,-7.84380217],[110.41348146,-7.84380316],[110.41375285,-7.84316292],[110.41564562,-7.84363759],[110.4156886,-7.84302025],[110.41591705,-7.84296363],[110.41598533,-7.84249169],[110.41622234,-7.842256],[110.41598689,-7.84137904],[110.41676408,-7.84171729],[110.41686532,-7.84185229],[110.41659436,-7.84218909],[110.41652594,-7.84276217],[110.41720217,-7.84276311],[110.41767529,-7.84293235],[110.41770854,-7.84333699],[110.41757226,-7.84407857],[110.41909335,-7.84438412],[110.41968226,-7.84450685],[110.412858,-7.849813],[110.41022144,-7.84927978]]]}},{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":86,"pedukuhan":"Pamotan"},"geometry":{"type":"Polygon","coordinates":[[[110.41745281,-7.86212099],[110.41732337,-7.86208591],[110.41686723,-7.86218101],[110.41657174,-7.86216904],[110.41615178,-7.86215204],[110.41564328,-7.86213144],[110.4148514,-7.86203461],[110.41463767,-7.86187431],[110.41427599,-7.86160303],[110.41352435,-7.86111973],[110.41338956,-7.86103306],[110.413687,-7.851564],[110.419095,-7.854021],[110.419481,-7.856722],[110.41745281,-7.86212099]]]}},{"type":"Feature","properties":{"object_id":40317,"jumlah_pen":54,"pedukuhan":"Combongan"},"geometry":{"type":"Polygon","coordinates":[[[110.42832801,-7.849316],[110.42897997,-7.85008801],[110.42941095,-7.85083049],[110.42950636,-7.8512614],[110.42959989,-7.85166806],[110.42964951,-7.85188383],[110.42964928,-7.85205135],[110.42902473,-7.85245735],[110.42844792,-7.85305487],[110.42772707,-7.85367612],[110.42724622,-7.8542977],[110.42698143,-7.85487171],[110.42681235,-7.85566124],[110.42637946,-7.85630681],[110.42575447,-7.85702392],[110.42552522,-7.85727143],[110.421257,-7.856264],[110.42832801,-7.849316]]]}}]}';

        //SDGs Controller
        $dataSDGs = SDGs::all()->groupBy(['tahun', 'target_sdgs']);

        $formattedDataSDGs = [];
        $categoriesSDGs = SDGs::distinct('target_sdgs')->pluck('target_sdgs')->toArray();

        foreach ($dataSDGs as $year => $targets) {
            $yearData = [];
            foreach ($categoriesSDGs as $target) {
                $averageValue = $targets->get($target, collect([]))->avg('nilai_indikator') ?: 0;
                $yearData[] = $averageValue;
            }
            $formattedDataSDGs[] = [
                'name' => $year,
                'data' => $yearData
            ];
        }

        // Keuangan Controller
        $pemasukan = AnggaranTransaksi::where('jenis_transaksi', 'pemasukan')->get();
        $pengeluaran = AnggaranTransaksi::where('jenis_transaksi', 'pengeluaran')->get();

        return view('kabar-desa-informasi', compact('pemasukan', 'pengeluaran'));
    }
    
}
