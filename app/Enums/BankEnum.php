<?php


namespace App\Enums;


class BankEnum
{
    private static $data = '
[
  {
    "label": "Bank Mandiri",
    "value": "mandiri"
  },
  {
    "label": "Bank Rakyat Indonesia",
    "value": "bri"
  },
  {
    "label": "BNI (Bank Negara Indonesia) & BNI Syariah",
    "value": "bni"
  },
  {
    "label": "Bank Central Asia",
    "value": "bca"
  },
  {
    "label": "Bank Syariah Mandiri",
    "value": "bsm"
  },
  {
    "label": "CIMB Niaga & CIMB Niaga Syariah",
    "value": "cimb"
  },
  {
    "label": "Muamalat",
    "value": "muamalat"
  },
  {
    "label": "Danamon",
    "value": "danamon"
  },
  {
    "label": "Bank Permata",
    "value": "permata"
  },
  {
    "label": "Maybank Indonesia",
    "value": "bii"
  },
  {
    "label": "Panin Bank",
    "value": "panin"
  },
  {
    "label": "UOB Indonesia",
    "value": "uob"
  },
  {
    "label": "OCBC NISP",
    "value": "ocbc"
  },
  {
    "label": "Citibank",
    "value": "citibank"
  },
  {
    "label": "Bank Artha Graha Internasional",
    "value": "artha"
  },
  {
    "label": "Bank of Tokyo Mitsubishi UFJ",
    "value": "tokyo"
  },
  {
    "label": "DBS Indonesia",
    "value": "dbs"
  },
  {
    "label": "Standard Chartered Bank",
    "value": "standard_chartered"
  },
  {
    "label": "Bank Capital Indonesia",
    "value": "capital"
  },
  {
    "label": "ANZ Indonesia",
    "value": "anz"
  },
  {
    "label": "Bank of China (Hong Kong) Limited",
    "value": "boc"
  },
  {
    "label": "Bank Bumi Arta",
    "value": "bumi_artha"
  },
  {
    "label": "HSBC Indonesia",
    "value": "hsbc"
  },
  {
    "label": "Rabobank International Indonesia",
    "value": "rabobank"
  },
  {
    "label": "Bank Mayapada",
    "value": "mayapada"
  },
  {
    "label": "BJB",
    "value": "bjb"
  },
  {
    "label": "Bank DKI Jakarta",
    "value": "dki"
  },
  {
    "label": "BPD DIY",
    "value": "daerah_istimewa"
  },
  {
    "label": "Bank Jateng",
    "value": "jawa_tengah"
  },
  {
    "label": "Bank Jatim",
    "value": "jawa_timur"
  },
  {
    "label": "Bank Jambi",
    "value": "jambi"
  },
  {
    "label": "Bank Sumut",
    "value": "sumut"
  },
  {
    "label": "Bank Sumbar (Bank Nagari)",
    "value": "sumatera_barat"
  },
  {
    "label": "Bank Riau Kepri",
    "value": "riau_dan_kepri"
  },
  {
    "label": "Bank Sumsel Babel",
    "value": "sumsel_dan_babel"
  },
  {
    "label": "Bank Lampung",
    "value": "lampung"
  },
  {
    "label": "Bank Kalsel",
    "value": "kalimantan_selatan"
  },
  {
    "label": "Bank Kalbar",
    "value": "kalimantan_barat"
  },
  {
    "label": "Bank Kaltim",
    "value": "kalimantan_timur"
  },
  {
    "label": "Bank Kalteng",
    "value": "kalimantan_tengah"
  },
  {
    "label": "Bank Sulselbar",
    "value": "sulselbar"
  },
  {
    "label": "Bank SulutGo",
    "value": "sulut"
  },
  {
    "label": "Bank NTB",
    "value": "nusa_tenggara_barat"
  },
  {
    "label": "BPD Bali",
    "value": "bali"
  },
  {
    "label": "Bank NTT",
    "value": "nusa_tenggara_timur"
  },
  {
    "label": "Bank Maluku",
    "value": "maluku"
  },
  {
    "label": "Bank Papua",
    "value": "papua"
  },
  {
    "label": "Bank Bengkulu",
    "value": "bengkulu"
  },
  {
    "label": "Bank Sulteng",
    "value": "sulawesi"
  },
  {
    "label": "Bank Sultra",
    "value": "sulawesi_tenggara"
  },
  {
    "label": "Bank Nusantara Parahyangan",
    "value": "nusantara_parahyangan"
  },
  {
    "label": "Bank of India Indonesia",
    "value": "india"
  },
  {
    "label": "Bank Mestika Dharma",
    "value": "mestika_dharma"
  },
  {
    "label": "Bank Sinarmas",
    "value": "sinarmas"
  },
  {
    "label": "Bank Maspion Indonesia",
    "value": "maspion"
  },
  {
    "label": "Bank Ganesha",
    "value": "ganesha"
  },
  {
    "label": "ICBC Indonesia",
    "value": "icbc"
  },
  {
    "label": "QNB Indonesia",
    "value": "qnb_kesawan"
  },
  {
    "label": "BTN (Bank Tabungan Negara)",
    "value": "btn"
  },
  {
    "label": "Bank Woori Saudara",
    "value": "woori"
  },
  {
    "label": "BTPN",
    "value": "tabungan_pensiunan_nasional"
  },
  {
    "label": "BRI (Bank Rakyat Indonesia) Syariah",
    "value": "bri_syr"
  },
  {
    "label": "BJB Syariah",
    "value": "bjb_syr"
  },
  {
    "label": "Bank Mega",
    "value": "mega"
  },
  {
    "label": "Bukopin",
    "value": "bukopin"
  },
  {
    "label": "Bank Jasa Jakarta",
    "value": "jasa_jakarta"
  },
  {
    "label": "KEB Hana Bank Indonesia",
    "value": "hana"
  },
  {
    "label": "Bank MNC Internasional",
    "value": "mnc_internasional"
  },
  {
    "label": "BRI Agroniaga",
    "value": "agroniaga"
  },
  {
    "label": "SBI Indonesia",
    "value": "sbi_indonesia"
  },
  {
    "label": "Bank Royal Indonesia",
    "value": "royal"
  },
  {
    "label": "Nobu (Nationalnobu) Bank",
    "value": "nationalnobu"
  },
  {
    "label": "Bank Mega Syariah",
    "value": "mega_syr"
  },
  {
    "label": "Bank Ina Perdana",
    "value": "ina_perdana"
  },
  {
    "label": "Bank Sahabat Sampoerna",
    "value": "sahabat_sampoerna"
  },
  {
    "label": "Bank Kesejahteraan Ekonomi",
    "value": "kesejahteraan_ekonomi"
  },
  {
    "label": "BCA (Bank Central Asia) Syariah",
    "value": "bca_syr"
  },
  {
    "label": "Bank Artos Indonesia",
    "value": "artos"
  },
  {
    "label": "Bank Mayora Indonesia",
    "value": "mayora"
  },
  {
    "label": "Bank Index Selindo",
    "value": "index_selindo"
  },
  {
    "label": "Bank Victoria International",
    "value": "victoria_internasional"
  },
  {
    "label": "Bank Agris",
    "value": "agris"
  },
  {
    "label": "CTBC (Chinatrust) Indonesia",
    "value": "chinatrust"
  },
  {
    "label": "Commonwealth Bank",
    "value": "commonwealth"
  }
]
    ';


    public static function getAll()
    {
        return json_decode(self::$data);
    }

}
