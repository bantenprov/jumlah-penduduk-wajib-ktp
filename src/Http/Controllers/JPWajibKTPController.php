<?php namespace Bantenprov\JPWajibKTP\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\JPWajibKTP\Facades\JPWajibKTP;

/* Models */
use Bantenprov\JPWajibKTP\Models\Bantenprov\JPWajibKTP\JPWajibKTP as JPWajibKTPModel;
use Bantenprov\JPWajibKTP\Models\Bantenprov\JPWajibKTP\Province;
use Bantenprov\JPWajibKTP\Models\Bantenprov\JPWajibKTP\Regency;

/* etc */
use Validator;

/**
 * The JPWajibKTPController class.
 *
 * @package Bantenprov\JPWajibKTP
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPWajibKTPController extends Controller
{

    protected $province;

    protected $regency;

    protected $jumlah_penduduk_wajib_ktp;

    public function __construct(Regency $regency, Province $province, JPWajibKTPModel $jumlah_penduduk_wajib_ktp)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->jumlah_penduduk_wajib_ktp     = $jumlah_penduduk_wajib_ktp;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $jumlah_penduduk_wajib_ktp = $this->jumlah_penduduk_wajib_ktp->find($id);

        return response()->json([
            'negara'    => $jumlah_penduduk_wajib_ktp->negara,
            'province'  => $jumlah_penduduk_wajib_ktp->getProvince->name,
            'regencies' => $jumlah_penduduk_wajib_ktp->getRegency->name,
            'tahun'     => $jumlah_penduduk_wajib_ktp->tahun,
            'data'      => $jumlah_penduduk_wajib_ktp->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->jumlah_penduduk_wajib_ktp->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->jumlah_penduduk_wajib_ktp->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'Jumlah Penduduk '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

