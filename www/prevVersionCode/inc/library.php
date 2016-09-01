<?php
/**
 * @return mixed
 */
function get_base_url() {
    return $_SERVER['HTTP_HOST'];
}

/**
 * @param $state_id
 * @return string
 */
function get_client_state_class($state_id) {
    $bg_class = "";

    if (2 == $state_id) {
        $bg_class = " class=\"bg-info\"";
    } elseif (3 == $state_id) {
        $bg_class = " class=\"bg-danger\"";
    } elseif (4 == $state_id) {
        $bg_class = " class=\"bg-success\"";
    }

    return $bg_class;
}

/**
 * Get list of PPVA
 *
 * @return array
 */
function get_ppva_array() {

    $ppva_array = array(
        5 => "Польщі Івано-Франківськ",
        7 => "Польщі Львів",
        8 => "Польщі Тернопіль",
        9 => "Польщі Рівне",
        10 => "Польщі Луцьк",
        11 => "Польщі Дніпропетровськ",
        12 => "Польщі Харків",
        13 => "Польщі Київ",
        14 => "Польщі Одеса",
        15 => "Польщі Хмельницький",
        16 => "Польщі Житомир",
        17 => "Польщі Вінниця",
        19 => "Польщі Донецьк",
        20 => "Польщі Ужгород",
        21 => "Польщі Чернівці",
        22 => "Польщі Луганськ",
    );

    return $ppva_array;
}

/**
 * Get ppva by it's id
 * @param $id
 * @return mixed
 */
function get_ppva_by_id($id) {
    $ppva_list = get_ppva_array();

    return $ppva_list[$id];
}

/**
 * @return array
 */
function get_client_status_array() {
    $client_status = array(
        "Dr." => "Dr.",
        "Mr." => "Mr.",
        "Mrs." => "Mrs.",
        "Ms." => "Ms.",
        "Mstr." => "Mstr.",
    );
     return $client_status;
}

/**
 * @return array
 */
function get_purpose_array() {
    $purpose = array(
        1 => "Подача документів",
        2 => "Консультація",
    );
     return $purpose;
}

/**
 * Get list of nationalities
 *
 * @return array
 */
function get_nationality_array() {

    $nationality_array = array(
        1 => "AFGHANISTAN",
        2 => "ALBANIA",
        3 => "ALGERIA",
        4 => "ANDORRA",
        5 => "ANGOLA",
        6 => "ANGUILLA",
        7 => "ANTIGUA &amp; BARBUDA",
        8 => "ARGENTINA",
        9 => "ARMENIA",
        10 => "ARUBA",
        11 => "AUSTRALIA",
        12 => "AUSTRIA",
        13 => "AZERBAIJAN",
        14 => "BAHAMAS",
        15 => "BAHRAIN",
        16 => "BANGLADESH",
        17 => "BARBADOS",
        18 => "BELARUS",
        19 => "BELGIUM",
        20 => "BELIZE",
        21 => "BENIN",
        22 => "BERMUDA ISLANDS",
        23 => "BHUTAN",
        24 => "BOLIVIA",
        25 => "BOSNIA-HERCEGOVINA",
        26 => "BOTSWANA",
        27 => "BRAZIL",
        28 => "BRUNEI",
        29 => "BULGARIA",
        30 => "BURKINA FASO",
        31 => "BURUNDI",
        32 => "CAMBODIA",
        33 => "CAMEROON",
        34 => "CANADA",
        35 => "CAPE VERDE",
        36 => "CAYMAN ISLANDS",
        37 => "CENTRAL AFRICAN REP.",
        38 => "CHAD",
        39 => "CHILE",
        40 => "CHINA",
        41 => "COLOMBIA",
        42 => "COMOROS",
        43 => "CONGO, DEM. REP.",
        44 => "CONGO, REP.",
        45 => "COSTA RICA",
        46 => "CROATIA",
        47 => "CUBA",
        48 => "CYPRUS",
        49 => "CZECH REPUBLIC",
        50 => "DENMARK",
        51 => "DJIBOUTI",
        52 => "DOMINICA",
        53 => "DOMINICAN REPUBLIC",
        54 => "EAST TIMOR",
        55 => "ECUADOR",
        56 => "EGYPT",
        57 => "EL SALVADOR",
        58 => "EQUATORIAL GUINEA",
        59 => "ERITREA",
        60 => "ESTONIA",
        61 => "ETHIOPIA",
        62 => "FEDERATED STATES OF MICRONESIA",
        63 => "FEDERATION OF SAINT KITTS,CHRISTOPHER AND NEVIS",
        64 => "FIJI",
        65 => "FINLAND",
        66 => "FRANCE",
        67 => "GABON",
        68 => "GAMBIA",
        69 => "GEORGIA",
        70 => "GERMANY",
        71 => "GHANA",
        72 => "GREECE",
        73 => "GRENADA",
        74 => "GRENADINES",
        75 => "GUATEMALA",
        76 => "GUINEA",
        77 => "GUINEA-BISSAU",
        78 => "GUYANA",
        79 => "HAITI",
        80 => "HONDURAS",
        81 => "HONGKONG AND MACAO",
        82 => "HUNGARY",
        83 => "ICELAND",
        84 => "INDIA",
        85 => "INDONESIA",
        86 => "IRAN",
        87 => "IRAQ",
        88 => "IRELAND",
        89 => "ISRAEL",
        90 => "ITALY",
        91 => "IVORY COAST",
        92 => "JAMAICA",
        93 => "JAPAN",
        94 => "JORDAN",
        95 => "KAZAKSTAN",
        96 => "KENYA",
        97 => "KIRIBATI",
        98 => "KOREA (NORTH-)",
        99 => "KUWAIT",
        100 => "KYRGYSTAN",
        101 => "LAOS",
        102 => "LATVIA",
        103 => "LEBANON",
        104 => "LESOTHO",
        105 => "LIBERIA",
        106 => "LIBYA",
        107 => "LIECHTENSTEIN",
        108 => "LITHUANIA",
        109 => "LUXEMBOURG",
        110 => "MACAU",
        111 => "MACEDONIA",
        112 => "MADAGASCAR",
        113 => "MALAWI",
        114 => "MALAYSIA",
        115 => "MALDIVES",
        116 => "MALI",
        117 => "MALTA",
        118 => "MARSHALL ISLANDS",
        119 => "MAURITANIA",
        120 => "MAURITIUS",
        121 => "MEXICO",
        122 => "MICRONESIA",
        123 => "MOLDAVIA",
        124 => "MOLDOVA",
        125 => "MONACO",
        126 => "MONGOLIA",
        127 => "MONTENEGRO",
        128 => "MONTSERRAT",
        129 => "MOROCCO",
        130 => "MOZAMBIQUE",
        131 => "MYANMAR (BURMA)",
        132 => "NA",
        133 => "NAMIBIA",
        134 => "NAURU",
        135 => "NEPAL",
        136 => "NETHERLANDS",
        137 => "NETHERLANDS ANTILLES",
        138 => "NEW ZEALAND",
        139 => "NICARAGUA",
        140 => "NIGER",
        141 => "NIGERIA",
        142 => "NON-RUSSIAN",
        143 => "NORWAY",
        144 => "NOTHERN MARIANA ISLANDS",
        145 => "OMAN",
        146 => "OTHERS",
        147 => "PAKISTAN",
        148 => "PALAU ISLANDS",
        149 => "PALESTINE",
        150 => "PANAMA",
        151 => "PAPUA NEW GUINEA",
        152 => "PARAGUAY",
        153 => "PERU",
        154 => "PHILIPPINES",
        155 => "POLAND",
        156 => "PORTUGAL",
        157 => "QATAR",
        158 => "REPUBLIC DE COTE DIVOIRE",
        159 => "REPUBLIC OF BURUNDI",
        160 => "REPUBLIC OF CONGO",
        161 => "REPUBLIC OF CROATIA",
        162 => "REPUBLIC OF KIRIBATI",
        163 => "REPUBLIC OF KOREA",
        164 => "REPUBLIC OF KOSOVO",
        165 => "REPUBLIC OF MACEDONIA",
        166 => "REPUBLIC OF PALAU",
        167 => "REPUBLIC OF SLOVENIA",
        168 => "REPUBLIC OF THE MARSHALL ISLANDS",
        169 => "REUNION ISLANDS",
        170 => "ROM",
        171 => "ROMANIA",
        174 => "RUSSIAN FEDERATION",
        175 => "RWANDA",
        176 => "SAINT LUCIA",
        177 => "SAMOA",
        178 => "SAN MARINO",
        179 => "SAO TOMÉ &amp; PRINCIPE",
        180 => "SAUDI ARABIA",
        181 => "SENEGAL",
        182 => "SERBIA",
        183 => "SEYCHELLES",
        184 => "SIERRA LEONE",
        185 => "SINGAPORE",
        186 => "SLOVAK REPUBLIC",
        187 => "SLOVENIA",
        188 => "SOLOMON ISLANDS",
        189 => "SOMALIA",
        190 => "SOUTH AFRICA",
        191 => "SPAIN",
        192 => "SRI LANKA",
        193 => "ST. KITTS &amp; NEVIS",
        194 => "ST. LUCIA",
        195 => "ST. VINCENT &amp; THE",
        196 => "STATE OF ERITREA",
        197 => "SUDAN",
        198 => "SURINAM",
        199 => "SWAZILAND",
        200 => "SWEDEN",
        201 => "SWITZERLAND",
        202 => "SYRIA",
        203 => "TAIWAN",
        204 => "TAJIKISTAN",
        205 => "TANZANIA",
        206 => "THAILAND",
        207 => "THE BAHAMAS",
        208 => "THE PHILIPPINES",
        209 => "TIBET",
        210 => "TOGO",
        211 => "TONGA",
        212 => "TRINIDAD &amp; TOBAGO",
        213 => "TUNISIA",
        214 => "TURKEY",
        215 => "TURKMENISTAN",
        217 => "TUVALU",
        218 => "UGANDA",
        219 => "UKRAINE",
        216 => "Ukrainians",
        220 => "UN NATION",
        221 => "UN OFFICIAL",
        222 => "UNITED ARAB EMIRATES",
        223 => "UNITED KINGDOM",
        224 => "UNITED NATIONS ORGANIZATION",
        225 => "UNITED STATES OF AMERICA",
        226 => "URUGUAY",
        227 => "UZBEKISTAN",
        228 => "VANUATU",
        229 => "VATICAN CITY (HOLY SEE)",
        230 => "VENEZUELA",
        231 => "VIETNAM",
        232 => "YEMEN",
        233 => "YUGOSLAVIA",
        234 => "ZAMBIA",
        235 => "ZIMBABWE"
    );

    return $nationality_array;
}

/**
 * Get nationality by it's id
 * @param $id
 * @return mixed
 */
function get_nationality_by_id($id) {
    $nationality_list = get_nationality_array();

    return $nationality_list[$id];
}

/**
 * Set notifications into session
 *
 * @param $text
 * @param $status
 */
function set_session_notification($text, $status) {
    $_SESSION['notification']['status'] = $status;
    $_SESSION['notification']['message'] = $text;
}

/**
 * Display notification from session
 */
function display_notification() {
    if (isset($_SESSION['notification'])) {
        $notification_status = $_SESSION['notification']['status'];
        $notification_title = $_SESSION['notification']['title'];
        $notification_message = $_SESSION['notification']['message'];
        ?>
        <div class="alert alert-<?= $notification_status ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
            <strong><?= $notification_title ?></strong><?= $notification_message ?>
        </div>
        <?php
        unset ($_SESSION['notification']);
    }
}

function get_avatar($status) {
    if ('Mrs.' == $status || 'Ms.' == $status) {
        $image = 'female.png';
    } else {
        $image = 'male.png';
    }

    return '<img src="http://' . get_base_url() . '/assets/img/' . $image . '" alt="">';
}

function convert_date_to_timestamp($date) {
    $date_to_convert = DateTime::createFromFormat("d-m-Y", $date);
    $timestamp = $date_to_convert->getTimestamp();

    return $timestamp;
}

function convert_timastamp_to_date($timestamp) {
    $date = date("d-m-Y", $timestamp);

    return $date;
}

function convert_timastamp_to_date_slash($timestamp) {
    $date = date("d/m/Y", $timestamp);

    return $date;
}

function get_agents_by_id () {

}
?>