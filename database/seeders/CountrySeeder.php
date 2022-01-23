<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
            'country_id'=>1,
            'sort'=>'AF',
            'country_name'=>'Afghanistan',
            'phoneCode'=>93
            , 'is_active'=>0 , ],
            [
            'country_id'=>2,
            'sort'=>'AL',
            'country_name'=>'Albania',
            'phoneCode'=>355
            , 'is_active'=>0 , ],
            [
            'country_id'=>3,
            'sort'=>'DZ',
            'country_name'=>'Algeria',
            'phoneCode'=>213
            , 'is_active'=>0 , ],
            [
            'country_id'=>4,
            'sort'=>'AS',
            'country_name'=>'American Samoa',
            'phoneCode'=>1684
            , 'is_active'=>0 , ],
            [
            'country_id'=>5,
            'sort'=>'AD',
            'country_name'=>'Andorra',
            'phoneCode'=>376
            , 'is_active'=>0 , ],
            [
            'country_id'=>6,
            'sort'=>'AO',
            'country_name'=>'Angola',
            'phoneCode'=>244
            , 'is_active'=>0 , ],
            [
            'country_id'=>7,
            'sort'=>'AI',
            'country_name'=>'Anguilla',
            'phoneCode'=>1264
            , 'is_active'=>0 , ],
            [
            'country_id'=>8,
            'sort'=>'AQ',
            'country_name'=>'Antarctica',
            'phoneCode'=>0
            , 'is_active'=>0 , ],
            [
            'country_id'=>9,
            'sort'=>'AG',
            'country_name'=>'Antigua And Barbuda',
            'phoneCode'=>1268
            , 'is_active'=>0 , ],
            [
            'country_id'=>10,
            'sort'=>'AR',
            'country_name'=>'Argentina',
            'phoneCode'=>54
            , 'is_active'=>0 , ],
            [
            'country_id'=>11,
            'sort'=>'AM',
            'country_name'=>'Armenia',
            'phoneCode'=>374
            , 'is_active'=>0 , ],
            [
            'country_id'=>12,
            'sort'=>'AW',
            'country_name'=>'Aruba',
            'phoneCode'=>297
            , 'is_active'=>0 , ],
            [
            'country_id'=>13,
            'sort'=>'AU',
            'country_name'=>'Australia',
            'phoneCode'=>61
            , 'is_active'=>0 , ],
            [
            'country_id'=>14,
            'sort'=>'AT',
            'country_name'=>'Austria',
            'phoneCode'=>43
            , 'is_active'=>0 , ],
            [
            'country_id'=>15,
            'sort'=>'AZ',
            'country_name'=>'Azerbaijan',
            'phoneCode'=>994
            , 'is_active'=>0 , ],
            [
            'country_id'=>16,
            'sort'=>'BS',
            'country_name'=>'Bahamas The',
            'phoneCode'=>1242
            , 'is_active'=>0 , ],
            [
            'country_id'=>17,
            'sort'=>'BH',
            'country_name'=>'Bahrain',
            'phoneCode'=>973
            , 'is_active'=>0 , ],
            [
            'country_id'=>18,
            'sort'=>'BD',
            'country_name'=>'Bangladesh',
            'phoneCode'=>880
            , 'is_active'=>0 , ],
            [
            'country_id'=>19,
            'sort'=>'BB',
            'country_name'=>'Barbados',
            'phoneCode'=>1246
            , 'is_active'=>0 , ],
            [
            'country_id'=>20,
            'sort'=>'BY',
            'country_name'=>'Belarus',
            'phoneCode'=>375
            , 'is_active'=>0 , ],
            [
            'country_id'=>21,
            'sort'=>'BE',
            'country_name'=>'Belgium',
            'phoneCode'=>32
            , 'is_active'=>0 , ],
            [
            'country_id'=>22,
            'sort'=>'BZ',
            'country_name'=>'Belize',
            'phoneCode'=>501
            , 'is_active'=>0 , ],
            [
            'country_id'=>23,
            'sort'=>'BJ',
            'country_name'=>'Benin',
            'phoneCode'=>229
            , 'is_active'=>0 , ],
            [
            'country_id'=>24,
            'sort'=>'BM',
            'country_name'=>'Bermuda',
            'phoneCode'=>1441
            , 'is_active'=>0 , ],
            [
            'country_id'=>25,
            'sort'=>'BT',
            'country_name'=>'Bhutan',
            'phoneCode'=>975
            , 'is_active'=>0 , ],
            [
            'country_id'=>26,
            'sort'=>'BO',
            'country_name'=>'Bolivia',
            'phoneCode'=>591
            , 'is_active'=>0 , ],
            [
            'country_id'=>27,
            'sort'=>'BA',
            'country_name'=>'Bosnia and Herzegovina',
            'phoneCode'=>387
            , 'is_active'=>0 , ],
            [
            'country_id'=>28,
            'sort'=>'BW',
            'country_name'=>'Botswana',
            'phoneCode'=>267
            , 'is_active'=>0 , ],
            [
            'country_id'=>29,
            'sort'=>'BV',
            'country_name'=>'Bouvet Island',
            'phoneCode'=>0
            , 'is_active'=>0 , ],
            [
            'country_id'=>30,
            'sort'=>'BR',
            'country_name'=>'Brazil',
            'phoneCode'=>55
            , 'is_active'=>0 , ],
            [
            'country_id'=>31,
            'sort'=>'IO',
            'country_name'=>'British Indian Ocean Territory',
            'phoneCode'=>246
            , 'is_active'=>0 , ],
            [
            'country_id'=>32,
            'sort'=>'BN',
            'country_name'=>'Brunei',
            'phoneCode'=>673
            , 'is_active'=>0 , ],
            [
            'country_id'=>33,
            'sort'=>'BG',
            'country_name'=>'Bulgaria',
            'phoneCode'=>359
            , 'is_active'=>0 , ],
            [
            'country_id'=>34,
            'sort'=>'BF',
            'country_name'=>'Burkina Faso',
            'phoneCode'=>226
            , 'is_active'=>0 , ],
            [
            'country_id'=>35,
            'sort'=>'BI',
            'country_name'=>'Burundi',
            'phoneCode'=>257
            , 'is_active'=>0 , ],
            [
            'country_id'=>36,
            'sort'=>'KH',
            'country_name'=>'Cambodia',
            'phoneCode'=>855
            , 'is_active'=>0 , ],
            [
            'country_id'=>37,
            'sort'=>'CM',
            'country_name'=>'Cameroon',
            'phoneCode'=>237
            , 'is_active'=>0 , ],
            [
            'country_id'=>38,
            'sort'=>'CA',
            'country_name'=>'Canada',
            'phoneCode'=>1
            , 'is_active'=>0 , ],
            [
            'country_id'=>39,
            'sort'=>'CV',
            'country_name'=>'Cape Verde',
            'phoneCode'=>238
            , 'is_active'=>0 , ],
            [
            'country_id'=>40,
            'sort'=>'KY',
            'country_name'=>'Cayman Islands',
            'phoneCode'=>1345
            , 'is_active'=>0 , ],
            [
            'country_id'=>41,
            'sort'=>'CF',
            'country_name'=>'Central African Republic',
            'phoneCode'=>236
            , 'is_active'=>0 , ],
            [
            'country_id'=>42,
            'sort'=>'TD',
            'country_name'=>'Chad',
            'phoneCode'=>235
            , 'is_active'=>0 , ],
            [
            'country_id'=>43,
            'sort'=>'CL',
            'country_name'=>'Chile',
            'phoneCode'=>56
            , 'is_active'=>0 , ],
            [
            'country_id'=>44,
            'sort'=>'CN',
            'country_name'=>'China',
            'phoneCode'=>86
            , 'is_active'=>0 , ],
            [
            'country_id'=>45,
            'sort'=>'CX',
            'country_name'=>'Christmas Island',
            'phoneCode'=>61
            , 'is_active'=>0 , ],
            [
            'country_id'=>46,
            'sort'=>'CC',
            'country_name'=>'Cocos (Keeling) Islands',
            'phoneCode'=>672
            , 'is_active'=>0 , ],
            [
            'country_id'=>47,
            'sort'=>'CO',
            'country_name'=>'Colombia',
            'phoneCode'=>57
            , 'is_active'=>0 , ],
            [
            'country_id'=>48,
            'sort'=>'KM',
            'country_name'=>'Comoros',
            'phoneCode'=>269
            , 'is_active'=>0 , ],
            [
            'country_id'=>49,
            'sort'=>'CG',
            'country_name'=>'Republic Of The Congo',
            'phoneCode'=>242
            , 'is_active'=>0 , ],
            [
            'country_id'=>50,
            'sort'=>'CD',
            'country_name'=>'Democratic Republic Of The Congo',
            'phoneCode'=>242
            , 'is_active'=>0 , ],
            [
            'country_id'=>51,
            'sort'=>'CK',
            'country_name'=>'Cook Islands',
            'phoneCode'=>682
            , 'is_active'=>0 , ],
            [
            'country_id'=>52,
            'sort'=>'CR',
            'country_name'=>'Costa Rica',
            'phoneCode'=>506
            , 'is_active'=>0 , ],
            [
            'country_id'=>53,
            'sort'=>'CI',
            'country_name'=>'Cote D Ivoire (Ivory Coast)',
            'phoneCode'=>225
            , 'is_active'=>0 , ],
            [
            'country_id'=>54,
            'sort'=>'HR',
            'country_name'=>'Croatia (Hrvatska)',
            'phoneCode'=>385
            , 'is_active'=>0 , ],
            [
            'country_id'=>55,
            'sort'=>'CU',
            'country_name'=>'Cuba',
            'phoneCode'=>53
            , 'is_active'=>0 , ],
            [
            'country_id'=>56,
            'sort'=>'CY',
            'country_name'=>'Cyprus',
            'phoneCode'=>357
            , 'is_active'=>0 , ],
            [
            'country_id'=>57,
            'sort'=>'CZ',
            'country_name'=>'Czech Republic',
            'phoneCode'=>420
            , 'is_active'=>0 , ],
            [
            'country_id'=>58,
            'sort'=>'DK',
            'country_name'=>'Denmark',
            'phoneCode'=>45
            , 'is_active'=>0 , ],
            [
            'country_id'=>59,
            'sort'=>'DJ',
            'country_name'=>'Djibouti',
            'phoneCode'=>253
            , 'is_active'=>0 , ],
            [
            'country_id'=>60,
            'sort'=>'DM',
            'country_name'=>'Dominica',
            'phoneCode'=>1767
            , 'is_active'=>0 , ],
            [
            'country_id'=>61,
            'sort'=>'DO',
            'country_name'=>'Dominican Republic',
            'phoneCode'=>1809
            , 'is_active'=>0 , ],
            [
            'country_id'=>62,
            'sort'=>'TP',
            'country_name'=>'East Timor',
            'phoneCode'=>670
            , 'is_active'=>0 , ],
            [
            'country_id'=>63,
            'sort'=>'EC',
            'country_name'=>'Ecuador',
            'phoneCode'=>593
            , 'is_active'=>0 , ],
            [
            'country_id'=>64,
            'sort'=>'EG',
            'country_name'=>'Egypt',
            'phoneCode'=>20
            , 'is_active'=>0 , ],
            [
            'country_id'=>65,
            'sort'=>'SV',
            'country_name'=>'El Salvador',
            'phoneCode'=>503
            , 'is_active'=>0 , ],
            [
            'country_id'=>66,
            'sort'=>'GQ',
            'country_name'=>'Equatorial Guinea',
            'phoneCode'=>240
            , 'is_active'=>0 , ],
            [
            'country_id'=>67,
            'sort'=>'ER',
            'country_name'=>'Eritrea',
            'phoneCode'=>291
            , 'is_active'=>0 , ],
            [
            'country_id'=>68,
            'sort'=>'EE',
            'country_name'=>'Estonia',
            'phoneCode'=>372
            , 'is_active'=>0 , ],
            [
            'country_id'=>69,
            'sort'=>'ET',
            'country_name'=>'Ethiopia',
            'phoneCode'=>251
            , 'is_active'=>0 , ],
            [
            'country_id'=>70,
            'sort'=>'XA',
            'country_name'=>'External Territories of Australia',
            'phoneCode'=>61
            , 'is_active'=>0 , ],
            [
            'country_id'=>71,
            'sort'=>'FK',
            'country_name'=>'Falkland Islands',
            'phoneCode'=>500
            , 'is_active'=>0 , ],
            [
            'country_id'=>72,
            'sort'=>'FO',
            'country_name'=>'Faroe Islands',
            'phoneCode'=>298
            , 'is_active'=>0 , ],
            [
            'country_id'=>73,
            'sort'=>'FJ',
            'country_name'=>'Fiji Islands',
            'phoneCode'=>679
            , 'is_active'=>0 , ],
            [
            'country_id'=>74,
            'sort'=>'FI',
            'country_name'=>'Finland',
            'phoneCode'=>358
            , 'is_active'=>0 , ],
            [
            'country_id'=>75,
            'sort'=>'FR',
            'country_name'=>'France',
            'phoneCode'=>33
            , 'is_active'=>0 , ],
            [
            'country_id'=>76,
            'sort'=>'GF',
            'country_name'=>'French Guiana',
            'phoneCode'=>594
            , 'is_active'=>0 , ],
            [
            'country_id'=>77,
            'sort'=>'PF',
            'country_name'=>'French Polynesia',
            'phoneCode'=>689
            , 'is_active'=>0 , ],
            [
            'country_id'=>78,
            'sort'=>'TF',
            'country_name'=>'French Southern Territories',
            'phoneCode'=>0
            , 'is_active'=>0 , ],
            [
            'country_id'=>79,
            'sort'=>'GA',
            'country_name'=>'Gabon',
            'phoneCode'=>241
            , 'is_active'=>0 , ],
            [
            'country_id'=>80,
            'sort'=>'GM',
            'country_name'=>'Gambia The',
            'phoneCode'=>220
            , 'is_active'=>0 , ],
            [
            'country_id'=>81,
            'sort'=>'GE',
            'country_name'=>'Georgia',
            'phoneCode'=>995
            , 'is_active'=>0 , ],
            [
            'country_id'=>82,
            'sort'=>'DE',
            'country_name'=>'Germany',
            'phoneCode'=>49
            , 'is_active'=>0 , ],
            [
            'country_id'=>83,
            'sort'=>'GH',
            'country_name'=>'Ghana',
            'phoneCode'=>233
            , 'is_active'=>0 , ],
            [
            'country_id'=>84,
            'sort'=>'GI',
            'country_name'=>'Gibraltar',
            'phoneCode'=>350
            , 'is_active'=>0 , ],
            [
            'country_id'=>85,
            'sort'=>'GR',
            'country_name'=>'Greece',
            'phoneCode'=>30
            , 'is_active'=>0 , ],
            [
            'country_id'=>86,
            'sort'=>'GL',
            'country_name'=>'Greenland',
            'phoneCode'=>299
            , 'is_active'=>0 , ],
            [
            'country_id'=>87,
            'sort'=>'GD',
            'country_name'=>'Grenada',
            'phoneCode'=>1473
            , 'is_active'=>0 , ],
            [
            'country_id'=>88,
            'sort'=>'GP',
            'country_name'=>'Guadeloupe',
            'phoneCode'=>590
            , 'is_active'=>0 , ],
            [
            'country_id'=>89,
            'sort'=>'GU',
            'country_name'=>'Guam',
            'phoneCode'=>1671
            , 'is_active'=>0 , ],
            [
            'country_id'=>90,
            'sort'=>'GT',
            'country_name'=>'Guatemala',
            'phoneCode'=>502
            , 'is_active'=>0 , ],
            [
            'country_id'=>91,
            'sort'=>'XU',
            'country_name'=>'Guernsey and Alderney',
            'phoneCode'=>44
            , 'is_active'=>0 , ],
            [
            'country_id'=>92,
            'sort'=>'GN',
            'country_name'=>'Guinea',
            'phoneCode'=>224
            , 'is_active'=>0 , ],
            [
            'country_id'=>93,
            'sort'=>'GW',
            'country_name'=>'Guinea-Bissau',
            'phoneCode'=>245
            , 'is_active'=>0 , ],
            [
            'country_id'=>94,
            'sort'=>'GY',
            'country_name'=>'Guyana',
            'phoneCode'=>592
            , 'is_active'=>0 , ],
            [
            'country_id'=>95,
            'sort'=>'HT',
            'country_name'=>'Haiti',
            'phoneCode'=>509
            , 'is_active'=>0 , ],
            [
            'country_id'=>96,
            'sort'=>'HM',
            'country_name'=>'Heard and McDonald Islands',
            'phoneCode'=>0
            , 'is_active'=>0 , ],
            [
            'country_id'=>97,
            'sort'=>'HN',
            'country_name'=>'Honduras',
            'phoneCode'=>504
            , 'is_active'=>0 , ],
            [
            'country_id'=>98,
            'sort'=>'HK',
            'country_name'=>'Hong Kong S.A.R.',
            'phoneCode'=>852
            , 'is_active'=>0 , ],
            [
            'country_id'=>99,
            'sort'=>'HU',
            'country_name'=>'Hungary',
            'phoneCode'=>36
            , 'is_active'=>0 , ],
            [
            'country_id'=>100,
            'sort'=>'IS',
            'country_name'=>'Iceland',
            'phoneCode'=>354
            , 'is_active'=>0 , ],
            [
            'country_id'=>101,
            'sort'=>'IN',
            'country_name'=>'India',
            'phoneCode'=>91
            , 'is_active'=>1 , ],
            [
            'country_id'=>102,
            'sort'=>'country_id',
            'country_name'=>'Indonesia',
            'phoneCode'=>62
            , 'is_active'=>0 , ],
            [
            'country_id'=>103,
            'sort'=>'IR',
            'country_name'=>'Iran',
            'phoneCode'=>98
            , 'is_active'=>0 , ],
            [
            'country_id'=>104,
            'sort'=>'IQ',
            'country_name'=>'Iraq',
            'phoneCode'=>964
            , 'is_active'=>0 , ],
            [
            'country_id'=>105,
            'sort'=>'IE',
            'country_name'=>'Ireland',
            'phoneCode'=>353
            , 'is_active'=>0 , ],
            [
            'country_id'=>106,
            'sort'=>'IL',
            'country_name'=>'Israel',
            'phoneCode'=>972
            , 'is_active'=>0 , ],
            [
            'country_id'=>107,
            'sort'=>'IT',
            'country_name'=>'Italy',
            'phoneCode'=>39
            , 'is_active'=>0 , ],
            [
            'country_id'=>108,
            'sort'=>'JM',
            'country_name'=>'Jamaica',
            'phoneCode'=>1876
            , 'is_active'=>0 , ],
            [
            'country_id'=>109,
            'sort'=>'JP',
            'country_name'=>'Japan',
            'phoneCode'=>81
            , 'is_active'=>0 , ],
            [
            'country_id'=>110,
            'sort'=>'XJ',
            'country_name'=>'Jersey',
            'phoneCode'=>44
            , 'is_active'=>0 , ],
            [
            'country_id'=>111,
            'sort'=>'JO',
            'country_name'=>'Jordan',
            'phoneCode'=>962
            , 'is_active'=>0 , ],
            [
            'country_id'=>112,
            'sort'=>'KZ',
            'country_name'=>'Kazakhstan',
            'phoneCode'=>7
            , 'is_active'=>0 , ],
            [
            'country_id'=>113,
            'sort'=>'KE',
            'country_name'=>'Kenya',
            'phoneCode'=>254
            , 'is_active'=>0 , ],
            [
            'country_id'=>114,
            'sort'=>'KI',
            'country_name'=>'Kiribati',
            'phoneCode'=>686
            , 'is_active'=>0 , ],
            [
            'country_id'=>115,
            'sort'=>'KP',
            'country_name'=>'Korea North',
            'phoneCode'=>850
            , 'is_active'=>0 , ],
            [
            'country_id'=>116,
            'sort'=>'KR',
            'country_name'=>'Korea South',
            'phoneCode'=>82
            , 'is_active'=>0 , ],
            [
            'country_id'=>117,
            'sort'=>'KW',
            'country_name'=>'Kuwait',
            'phoneCode'=>965
            , 'is_active'=>0 , ],
            [
            'country_id'=>118,
            'sort'=>'KG',
            'country_name'=>'Kyrgyzstan',
            'phoneCode'=>996
            , 'is_active'=>0 , ],
            [
            'country_id'=>119,
            'sort'=>'LA',
            'country_name'=>'Laos',
            'phoneCode'=>856
            , 'is_active'=>0 , ],
            [
            'country_id'=>120,
            'sort'=>'LV',
            'country_name'=>'Latvia',
            'phoneCode'=>371
            , 'is_active'=>0 , ],
            [
            'country_id'=>121,
            'sort'=>'LB',
            'country_name'=>'Lebanon',
            'phoneCode'=>961
            , 'is_active'=>0 , ],
            [
            'country_id'=>122,
            'sort'=>'LS',
            'country_name'=>'Lesotho',
            'phoneCode'=>266
            , 'is_active'=>0 , ],
            [
            'country_id'=>123,
            'sort'=>'LR',
            'country_name'=>'Liberia',
            'phoneCode'=>231
            , 'is_active'=>0 , ],
            [
            'country_id'=>124,
            'sort'=>'LY',
            'country_name'=>'Libya',
            'phoneCode'=>218
            , 'is_active'=>0 , ],
            [
            'country_id'=>125,
            'sort'=>'LI',
            'country_name'=>'Liechtenstein',
            'phoneCode'=>423
            , 'is_active'=>0 , ],
            [
            'country_id'=>126,
            'sort'=>'LT',
            'country_name'=>'Lithuania',
            'phoneCode'=>370
            , 'is_active'=>0 , ],
            [
            'country_id'=>127,
            'sort'=>'LU',
            'country_name'=>'Luxembourg',
            'phoneCode'=>352
            , 'is_active'=>0 , ],
            [
            'country_id'=>128,
            'sort'=>'MO',
            'country_name'=>'Macau S.A.R.',
            'phoneCode'=>853
            , 'is_active'=>0 , ],
            [
            'country_id'=>129,
            'sort'=>'MK',
            'country_name'=>'Macedonia',
            'phoneCode'=>389
            , 'is_active'=>0 , ],
            [
            'country_id'=>130,
            'sort'=>'MG',
            'country_name'=>'Madagascar',
            'phoneCode'=>261
            , 'is_active'=>0 , ],
            [
            'country_id'=>131,
            'sort'=>'MW',
            'country_name'=>'Malawi',
            'phoneCode'=>265
            , 'is_active'=>0 , ],
            [
            'country_id'=>132,
            'sort'=>'MY',
            'country_name'=>'Malaysia',
            'phoneCode'=>60
            , 'is_active'=>0 , ],
            [
            'country_id'=>133,
            'sort'=>'MV',
            'country_name'=>'Maldives',
            'phoneCode'=>960
            , 'is_active'=>1 , ],
            [
            'country_id'=>134,
            'sort'=>'ML',
            'country_name'=>'Mali',
            'phoneCode'=>223
            , 'is_active'=>0 , ],
            [
            'country_id'=>135,
            'sort'=>'MT',
            'country_name'=>'Malta',
            'phoneCode'=>356
            , 'is_active'=>0 , ],
            [
            'country_id'=>136,
            'sort'=>'XM',
            'country_name'=>'Man (Isle of)',
            'phoneCode'=>44
            , 'is_active'=>0 , ],
            [
            'country_id'=>137,
            'sort'=>'MH',
            'country_name'=>'Marshall Islands',
            'phoneCode'=>692
            , 'is_active'=>0 , ],
            [
            'country_id'=>138,
            'sort'=>'MQ',
            'country_name'=>'Martinique',
            'phoneCode'=>596
            , 'is_active'=>0 , ],
            [
            'country_id'=>139,
            'sort'=>'MR',
            'country_name'=>'Mauritania',
            'phoneCode'=>222
            , 'is_active'=>0 , ],
            [
            'country_id'=>140,
            'sort'=>'MU',
            'country_name'=>'Mauritius',
            'phoneCode'=>230
            , 'is_active'=>0 , ],
            [
            'country_id'=>141,
            'sort'=>'YT',
            'country_name'=>'Mayotte',
            'phoneCode'=>269
            , 'is_active'=>0 , ],
            [
            'country_id'=>142,
            'sort'=>'MX',
            'country_name'=>'Mexico',
            'phoneCode'=>52
            , 'is_active'=>0 , ],
            [
            'country_id'=>143,
            'sort'=>'FM',
            'country_name'=>'Micronesia',
            'phoneCode'=>691
            , 'is_active'=>0 , ],
            [
            'country_id'=>144,
            'sort'=>'MD',
            'country_name'=>'Moldova',
            'phoneCode'=>373
            , 'is_active'=>0 , ],
            [
            'country_id'=>145,
            'sort'=>'MC',
            'country_name'=>'Monaco',
            'phoneCode'=>377
            , 'is_active'=>0 , ],
            [
            'country_id'=>146,
            'sort'=>'MN',
            'country_name'=>'Mongolia',
            'phoneCode'=>976
            , 'is_active'=>0 , ],
            [
            'country_id'=>147,
            'sort'=>'MS',
            'country_name'=>'Montserrat',
            'phoneCode'=>1664
            , 'is_active'=>0 , ],
            [
            'country_id'=>148,
            'sort'=>'MA',
            'country_name'=>'Morocco',
            'phoneCode'=>212
            , 'is_active'=>0 , ],
            [
            'country_id'=>149,
            'sort'=>'MZ',
            'country_name'=>'Mozambique',
            'phoneCode'=>258
            , 'is_active'=>0 , ],
            [
            'country_id'=>150,
            'sort'=>'MM',
            'country_name'=>'Myanmar',
            'phoneCode'=>95
            , 'is_active'=>0 , ],
            [
            'country_id'=>151,
            'sort'=>'NA',
            'country_name'=>'Namibia',
            'phoneCode'=>264
            , 'is_active'=>0 , ],
            [
            'country_id'=>152,
            'sort'=>'NR',
            'country_name'=>'Nauru',
            'phoneCode'=>674
            , 'is_active'=>0 , ],
            [
            'country_id'=>153,
            'sort'=>'NP',
            'country_name'=>'Nepal',
            'phoneCode'=>977
            , 'is_active'=>0 , ],
            [
            'country_id'=>154,
            'sort'=>'AN',
            'country_name'=>'Netherlands Antilles',
            'phoneCode'=>599
            , 'is_active'=>0 , ],
            [
            'country_id'=>155,
            'sort'=>'NL',
            'country_name'=>'Netherlands The',
            'phoneCode'=>31
            , 'is_active'=>0 , ],
            [
            'country_id'=>156,
            'sort'=>'NC',
            'country_name'=>'New Caledonia',
            'phoneCode'=>687
            , 'is_active'=>0 , ],
            [
            'country_id'=>157,
            'sort'=>'NZ',
            'country_name'=>'New Zealand',
            'phoneCode'=>64
            , 'is_active'=>0 , ],
            [
            'country_id'=>158,
            'sort'=>'NI',
            'country_name'=>'Nicaragua',
            'phoneCode'=>505
            , 'is_active'=>0 , ],
            [
            'country_id'=>159,
            'sort'=>'NE',
            'country_name'=>'Niger',
            'phoneCode'=>227
            , 'is_active'=>0 , ],
            [
            'country_id'=>160,
            'sort'=>'NG',
            'country_name'=>'Nigeria',
            'phoneCode'=>234
            , 'is_active'=>0 , ],
            [
            'country_id'=>161,
            'sort'=>'NU',
            'country_name'=>'Niue',
            'phoneCode'=>683
            , 'is_active'=>0 , ],
            [
            'country_id'=>162,
            'sort'=>'NF',
            'country_name'=>'Norfolk Island',
            'phoneCode'=>672
            , 'is_active'=>0 , ],
            [
            'country_id'=>163,
            'sort'=>'MP',
            'country_name'=>'Northern Mariana Islands',
            'phoneCode'=>1670
            , 'is_active'=>0 , ],
            [
            'country_id'=>164,
            'sort'=>'NO',
            'country_name'=>'Norway',
            'phoneCode'=>47
            , 'is_active'=>0 , ],
            [
            'country_id'=>165,
            'sort'=>'OM',
            'country_name'=>'Oman',
            'phoneCode'=>968
            , 'is_active'=>0 , ],
            [
            'country_id'=>166,
            'sort'=>'PK',
            'country_name'=>'Pakistan',
            'phoneCode'=>92
            , 'is_active'=>0 , ],
            [
            'country_id'=>167,
            'sort'=>'PW',
            'country_name'=>'Palau',
            'phoneCode'=>680
            , 'is_active'=>0 , ],
            [
            'country_id'=>168,
            'sort'=>'PS',
            'country_name'=>'Palestinian Territory Occupied',
            'phoneCode'=>970
            , 'is_active'=>0 , ],
            [
            'country_id'=>169,
            'sort'=>'PA',
            'country_name'=>'Panama',
            'phoneCode'=>507
            , 'is_active'=>0 , ],
            [
            'country_id'=>170,
            'sort'=>'PG',
            'country_name'=>'Papua new Guinea',
            'phoneCode'=>675
            , 'is_active'=>0 , ],
            [
            'country_id'=>171,
            'sort'=>'PY',
            'country_name'=>'Paraguay',
            'phoneCode'=>595
            , 'is_active'=>0 , ],
            [
            'country_id'=>172,
            'sort'=>'PE',
            'country_name'=>'Peru',
            'phoneCode'=>51
            , 'is_active'=>0 , ],
            [
            'country_id'=>173,
            'sort'=>'PH',
            'country_name'=>'Philippines',
            'phoneCode'=>63
            , 'is_active'=>0 , ],
            [
            'country_id'=>174,
            'sort'=>'PN',
            'country_name'=>'Pitcairn Island',
            'phoneCode'=>0
            , 'is_active'=>0 , ],
            [
            'country_id'=>175,
            'sort'=>'PL',
            'country_name'=>'Poland',
            'phoneCode'=>48
            , 'is_active'=>0 , ],
            [
            'country_id'=>176,
            'sort'=>'PT',
            'country_name'=>'Portugal',
            'phoneCode'=>351
            , 'is_active'=>0 , ],
            [
            'country_id'=>177,
            'sort'=>'PR',
            'country_name'=>'Puerto Rico',
            'phoneCode'=>1787
            , 'is_active'=>0 , ],
            [
            'country_id'=>178,
            'sort'=>'QA',
            'country_name'=>'Qatar',
            'phoneCode'=>974
            , 'is_active'=>0 , ],
            [
            'country_id'=>179,
            'sort'=>'RE',
            'country_name'=>'Reunion',
            'phoneCode'=>262
            , 'is_active'=>0 , ],
            [
            'country_id'=>180,
            'sort'=>'RO',
            'country_name'=>'Romania',
            'phoneCode'=>40
            , 'is_active'=>0 , ],
            [
            'country_id'=>181,
            'sort'=>'RU',
            'country_name'=>'Russia',
            'phoneCode'=>70
            , 'is_active'=>0 , ],
            [
            'country_id'=>182,
            'sort'=>'RW',
            'country_name'=>'Rwanda',
            'phoneCode'=>250
            , 'is_active'=>0 , ],
            [
            'country_id'=>183,
            'sort'=>'SH',
            'country_name'=>'Saint Helena',
            'phoneCode'=>290
            , 'is_active'=>0 , ],
            [
            'country_id'=>184,
            'sort'=>'KN',
            'country_name'=>'Saint Kitts And Nevis',
            'phoneCode'=>1869
            , 'is_active'=>0 , ],
            [
            'country_id'=>185,
            'sort'=>'LC',
            'country_name'=>'Saint Lucia',
            'phoneCode'=>1758
            , 'is_active'=>0 , ],
            [
            'country_id'=>186,
            'sort'=>'PM',
            'country_name'=>'Saint Pierre and Miquelon',
            'phoneCode'=>508
            , 'is_active'=>0 , ],
            [
            'country_id'=>187,
            'sort'=>'VC',
            'country_name'=>'Saint Vincent And The Grenadines',
            'phoneCode'=>1784
            , 'is_active'=>0 , ],
            [
            'country_id'=>188,
            'sort'=>'WS',
            'country_name'=>'Samoa',
            'phoneCode'=>684
            , 'is_active'=>0 , ],
            [
            'country_id'=>189,
            'sort'=>'SM',
            'country_name'=>'San Marino',
            'phoneCode'=>378
            , 'is_active'=>0 , ],
            [
            'country_id'=>190,
            'sort'=>'ST',
            'country_name'=>'Sao Tome and Principe',
            'phoneCode'=>239
            , 'is_active'=>0 , ],
            [
            'country_id'=>191,
            'sort'=>'SA',
            'country_name'=>'Saudi Arabia',
            'phoneCode'=>966
            , 'is_active'=>0 , ],
            [
            'country_id'=>192,
            'sort'=>'SN',
            'country_name'=>'Senegal',
            'phoneCode'=>221
            , 'is_active'=>0 , ],
            [
            'country_id'=>193,
            'sort'=>'RS',
            'country_name'=>'Serbia',
            'phoneCode'=>381
            , 'is_active'=>0 , ],
            [
            'country_id'=>194,
            'sort'=>'SC',
            'country_name'=>'Seychelles',
            'phoneCode'=>248
            , 'is_active'=>0 , ],
            [
            'country_id'=>195,
            'sort'=>'SL',
            'country_name'=>'Sierra Leone',
            'phoneCode'=>232
            , 'is_active'=>0 , ],
            [
            'country_id'=>196,
            'sort'=>'SG',
            'country_name'=>'Singapore',
            'phoneCode'=>65
            , 'is_active'=>0 , ],
            [
            'country_id'=>197,
            'sort'=>'SK',
            'country_name'=>'Slovakia',
            'phoneCode'=>421
            , 'is_active'=>0 , ],
            [
            'country_id'=>198,
            'sort'=>'SI',
            'country_name'=>'Slovenia',
            'phoneCode'=>386
            , 'is_active'=>0 , ],
            [
            'country_id'=>199,
            'sort'=>'XG',
            'country_name'=>'Smaller Territories of the UK',
            'phoneCode'=>44
            , 'is_active'=>0 , ],
            [
            'country_id'=>200,
            'sort'=>'SB',
            'country_name'=>'Solomon Islands',
            'phoneCode'=>677
            , 'is_active'=>0 , ],
            [
            'country_id'=>201,
            'sort'=>'SO',
            'country_name'=>'Somalia',
            'phoneCode'=>252
            , 'is_active'=>0 , ],
            [
            'country_id'=>202,
            'sort'=>'ZA',
            'country_name'=>'South Africa',
            'phoneCode'=>27
            , 'is_active'=>0 , ],
            [
            'country_id'=>203,
            'sort'=>'GS',
            'country_name'=>'South Georgia',
            'phoneCode'=>0
            , 'is_active'=>0 , ],
            [
            'country_id'=>204,
            'sort'=>'SS',
            'country_name'=>'South Sudan',
            'phoneCode'=>211
            , 'is_active'=>0 , ],
            [
            'country_id'=>205,
            'sort'=>'ES',
            'country_name'=>'Spain',
            'phoneCode'=>34
            , 'is_active'=>0 , ],
            [
            'country_id'=>206,
            'sort'=>'LK',
            'country_name'=>'Sri Lanka',
            'phoneCode'=>94
            , 'is_active'=>1 , ],
            [
            'country_id'=>207,
            'sort'=>'SD',
            'country_name'=>'Sudan',
            'phoneCode'=>249
            , 'is_active'=>0 , ],
            [
            'country_id'=>208,
            'sort'=>'SR',
            'country_name'=>'Suricountry_name',
            'phoneCode'=>597
            , 'is_active'=>0 , ],
            [
            'country_id'=>209,
            'sort'=>'SJ',
            'country_name'=>'Svalbard And Jan Mayen Islands',
            'phoneCode'=>47
            , 'is_active'=>0 , ],
            [
            'country_id'=>210,
            'sort'=>'SZ',
            'country_name'=>'Swaziland',
            'phoneCode'=>268
            , 'is_active'=>0 , ],
            [
            'country_id'=>211,
            'sort'=>'SE',
            'country_name'=>'Sweden',
            'phoneCode'=>46
            , 'is_active'=>0 , ],
            [
            'country_id'=>212,
            'sort'=>'CH',
            'country_name'=>'Switzerland',
            'phoneCode'=>41
            , 'is_active'=>0 , ],
            [
            'country_id'=>213,
            'sort'=>'SY',
            'country_name'=>'Syria',
            'phoneCode'=>963
            , 'is_active'=>0 , ],
            [
            'country_id'=>214,
            'sort'=>'TW',
            'country_name'=>'Taiwan',
            'phoneCode'=>886
            , 'is_active'=>0 , ],
            [
            'country_id'=>215,
            'sort'=>'TJ',
            'country_name'=>'Tajikistan',
            'phoneCode'=>992
            , 'is_active'=>0 , ],
            [
            'country_id'=>216,
            'sort'=>'TZ',
            'country_name'=>'Tanzania',
            'phoneCode'=>255
            , 'is_active'=>0 , ],
            [
            'country_id'=>217,
            'sort'=>'TH',
            'country_name'=>'Thailand',
            'phoneCode'=>66
            , 'is_active'=>0 , ],
            [
            'country_id'=>218,
            'sort'=>'TG',
            'country_name'=>'Togo',
            'phoneCode'=>228
            , 'is_active'=>0 , ],
            [
            'country_id'=>219,
            'sort'=>'TK',
            'country_name'=>'Tokelau',
            'phoneCode'=>690
            , 'is_active'=>0 , ],
            [
            'country_id'=>220,
            'sort'=>'TO',
            'country_name'=>'Tonga',
            'phoneCode'=>676
            , 'is_active'=>0 , ],
            [
            'country_id'=>221,
            'sort'=>'TT',
            'country_name'=>'Trincountry_idad And Tobago',
            'phoneCode'=>1868
            , 'is_active'=>0 , ],
            [
            'country_id'=>222,
            'sort'=>'TN',
            'country_name'=>'Tunisia',
            'phoneCode'=>216
            , 'is_active'=>0 , ],
            [
            'country_id'=>223,
            'sort'=>'TR',
            'country_name'=>'Turkey',
            'phoneCode'=>90
            , 'is_active'=>0 , ],
            [
            'country_id'=>224,
            'sort'=>'TM',
            'country_name'=>'Turkmenistan',
            'phoneCode'=>7370
            , 'is_active'=>0 , ],
            [
            'country_id'=>225,
            'sort'=>'TC',
            'country_name'=>'Turks And Caicos Islands',
            'phoneCode'=>1649
            , 'is_active'=>0 , ],
            [
            'country_id'=>226,
            'sort'=>'TV',
            'country_name'=>'Tuvalu',
            'phoneCode'=>688
            , 'is_active'=>0 , ],
            [
            'country_id'=>227,
            'sort'=>'UG',
            'country_name'=>'Uganda',
            'phoneCode'=>256
            , 'is_active'=>0 , ],
            [
            'country_id'=>228,
            'sort'=>'UA',
            'country_name'=>'Ukraine',
            'phoneCode'=>380
            , 'is_active'=>0 , ],
            [
            'country_id'=>229,
            'sort'=>'AE',
            'country_name'=>'United Arab Emirates',
            'phoneCode'=>971
            , 'is_active'=>0 , ],
            [
            'country_id'=>230,
            'sort'=>'GB',
            'country_name'=>'United Kingdom',
            'phoneCode'=>44
            , 'is_active'=>0 , ],
            [
            'country_id'=>231,
            'sort'=>'US',
            'country_name'=>'United States',
            'phoneCode'=>1
            , 'is_active'=>0 , ],
            [
            'country_id'=>232,
            'sort'=>'UM',
            'country_name'=>'United States Minor Outlying Islands',
            'phoneCode'=>1
            , 'is_active'=>0 , ],
            [
            'country_id'=>233,
            'sort'=>'UY',
            'country_name'=>'Uruguay',
            'phoneCode'=>598
            , 'is_active'=>0 , ],
            [
            'country_id'=>234,
            'sort'=>'UZ',
            'country_name'=>'Uzbekistan',
            'phoneCode'=>998
            , 'is_active'=>0 , ],
            [
            'country_id'=>235,
            'sort'=>'VU',
            'country_name'=>'Vanuatu',
            'phoneCode'=>678
            , 'is_active'=>0 , ],
            [
            'country_id'=>236,
            'sort'=>'VA',
            'country_name'=>'Vatican City State (Holy See)',
            'phoneCode'=>39
            , 'is_active'=>0 , ],
            [
            'country_id'=>237,
            'sort'=>'VE',
            'country_name'=>'Venezuela',
            'phoneCode'=>58
            , 'is_active'=>0 , ],
            [
            'country_id'=>238,
            'sort'=>'VN',
            'country_name'=>'Vietnam',
            'phoneCode'=>84
            , 'is_active'=>0 , ],
            [
            'country_id'=>239,
            'sort'=>'VG',
            'country_name'=>'Virgin Islands (British)',
            'phoneCode'=>1284
            , 'is_active'=>0 , ],
            [
            'country_id'=>240,
            'sort'=>'VI',
            'country_name'=>'Virgin Islands (US)',
            'phoneCode'=>1340
            , 'is_active'=>0 , ],
            [
            'country_id'=>241,
            'sort'=>'WF',
            'country_name'=>'Wallis And Futuna Islands',
            'phoneCode'=>681
            , 'is_active'=>0 , ],
            [
            'country_id'=>242,
            'sort'=>'EH',
            'country_name'=>'Western Sahara',
            'phoneCode'=>212
            , 'is_active'=>0 , ],
            [
            'country_id'=>243,
            'sort'=>'YE',
            'country_name'=>'Yemen',
            'phoneCode'=>967
            , 'is_active'=>0 , ],
            [
            'country_id'=>244,
            'sort'=>'YU',
            'country_name'=>'Yugoslavia',
            'phoneCode'=>38
            , 'is_active'=>0 , ],
            [
            'country_id'=>245,
            'sort'=>'ZM',
            'country_name'=>'Zambia',
            'phoneCode'=>260
            , 'is_active'=>0 , ],
            [
            'country_id'=>246,
            'sort'=>'ZW',
            'country_name'=>'Zimbabwe',
            'phoneCode'=>26
            , 'is_active'=>0 , ],
        ]);
    }
}
