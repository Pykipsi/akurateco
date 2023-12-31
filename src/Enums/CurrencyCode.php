<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Enums;

enum CurrencyCode: string
{
    case UAE_DIRHAM = 'AED';
    case AFGHANI = 'AFN';
    case LEK = 'ALL';
    case ARMENIAN_DRAM = 'AMD';
    case NETHERLANDS_ANTILLIAN_GUILDER = 'ANG';
    case KWANZA = 'AOA';
    case ARGENTINE_PESO = 'ARS';
    case AUSTRALIAN_DOLLAR = 'AUD';
    case ARUBAN_GUILDER = 'AWG';
    case AZERBAIJANIAN_MANAT = 'AZN';
    case CONVERTIBLE_MARKS = 'BAM';
    case BARBADOS_DOLLAR = 'BBD';
    case TAKA = 'BDT';
    case BULGARIAN_LEV = 'BGN';
    case BAHRAINI_DINAR = 'BHD';
    case BURUNDI_FRANC = 'BIF';
    case BERMUDIAN_DOLLAR = 'BMD';
    case BRUNEI_DOLLAR = 'BND';
    case BOLIVIANO = 'BOB';
    case BRAZILIAN_REAL = 'BRL';
    case BAHAMIAN_DOLLAR = 'BSD';
    case NGULTRUM = 'BTN';
    case PULA = 'BWP';
    case BELARUSSIAN_RUBLE = 'BYR';
    case BELIZE_DOLLAR = 'BZD';
    case CANADIAN_DOLLAR = 'CAD';
    case CONGOLESE_FRANC = 'CDF';
    case SWISS_FRANC = 'CHF';
    case CHILEAN_PESO = 'CLP';
    case YUAN_RENMINBI = 'CNY';
    case COLOMBIAN_PESO = 'COP';
    case COSTA_RICAN_COLON = 'CRC';
    case CUBAN_PESO = 'CUP';
    case CAPE_VERDE_ESCUDO = 'CVE';
    case CZECH_KORUNA = 'CZK';
    case DJIBOUTI_FRANC = 'DJF';
    case DANISH_KRONE = 'DKK';
    case DOMINICAN_PESO = 'DOP';
    case ALGERIAN_DINAR = 'DZD';
    case KROON = 'EEK';
    case EGYPTIAN_POUND = 'EGP';
    case NAKFA = 'ERN';
    case ETHIOPIAN_BIRR = 'ETB';
    case EURO = 'EUR';
    case FIJI_DOLLAR = 'FJD';
    case FALKLAND_ISLANDS_POUND = 'FKP';
    case POUND_STERLING = 'GBP';
    case LARI = 'GEL';
    case CEDI = 'GHS';
    case GIBRALTAR_POUND = 'GIP';
    case DALASI = 'GMD';
    case GUINEA_FRANC = 'GNF';
    case QUETZAL = 'GTQ';
    case GUYANA_DOLLAR = 'GYD';
    case HONG_KONG_DOLLAR = 'HKD';
    case LEMPIRA = 'HNL';
    case CROATIAN_KUNA = 'HRK';
    case GOURDE = 'HTG';
    case FORINT = 'HUF';
    case RUPIAH = 'IDR';
    case NEW_ISRAELI_SHEQEL = 'ILS';
    case INDIAN_RUPEE = 'INR';
    case IRAQI_DINAR = 'IQD';
    case IRANIAN_RIAL = 'IRR';
    case ICELAND_KRONA = 'ISK';
    case JAMAICAN_DOLLAR = 'JMD';
    case JORDANIAN_DINAR = 'JOD';
    case YEN = 'JPY';
    case KENYAN_SHILLING = 'KES';
    case SOM = 'KGS';
    case RIEL = 'KHR';
    case COMORO_FRANC = 'KMF';
    case NORTH_KOREAN_WON = 'KPW';
    case WON = 'KRW';
    case KUWAITI_DINAR = 'KWD';
    case CAYMAN_ISLANDS_DOLLAR = 'KYD';
    case TENGE = 'KZT';
    case KIP = 'LAK';
    case LEBANESE_POUND = 'LBP';
    case SRI_LANKA_RUPEE = 'LKR';
    case LIBERIAN_DOLLAR = 'LRD';
    case LOTI = 'LSL';
    case LITHUANIAN_LITAS = 'LTL';
    case LATVIAN_LATS = 'LVL';
    case LIBYAN_DINAR = 'LYD';
    case MOROCCAN_DIRHAM = 'MAD';
    case MOLDOVAN_LEU = 'MDL';
    case MALAGASY_ARIARY = 'MGA';
    case DENAR = 'MKD';
    case KYAT = 'MMK';
    case TUGRIK = 'MNT';
    case PATACA = 'MOP';
    case OUGUIYA = 'MRO';
    case MAURITIUS_RUPEE = 'MUR';
    case RUFIYAA = 'MVR';
    case KWACHA = 'MWK';
    case MEXICAN_PESO = 'MXN';
    case MALAYSIAN_RINGGIT = 'MYR';
    case METICAL = 'MZN';
    case NAMIBIA_DOLLAR = 'NAD';
    case NAIRA = 'NGN';
    case CORDOBA_ORO = 'NIO';
    case NORWEGIAN_KRONE = 'NOK';
    case NEPALESE_RUPEE = 'NPR';
    case NEW_ZEALAND_DOLLAR = 'NZD';
    case RIAL_OMANI = 'OMR';
    case BALBOA = 'PAB';
    case NUEVO_SOL = 'PEN';
    case KINA = 'PGK';
    case PHILIPPINE_PESO = 'PHP';
    case PAKISTAN_RUPEE = 'PKR';
    case ZLOTY = 'PLN';
    case GUARANI = 'PYG';
    case QATARI_RIAL = 'QAR';
    case NEW_LEU = 'RON';
    case SERBIAN_DINAR = 'RSD';
    case RUSSIAN_RUBLE = 'RUB';
    case RWANDA_FRANC = 'RWF';
    case SAUDI_RIYAL = 'SAR';
    case SOLOMON_ISLANDS_DOLLAR = 'SBD';
    case SEYCHELLES_RUPEE = 'SCR';
    case SUDANESE_POUND = 'SDG';
    case SWEDISH_KRONA = 'SEK';
    case SINGAPORE_DOLLAR = 'SGD';
    case SAINT_HELENA_POUND = 'SHP';
    case LEONE = 'SLL';
    case SOMALI_SHILLING = 'SOS';
    case SURINAM_DOLLAR = 'SRD';
    case DOBRA = 'STD';
    case EL_SALVADOR_COLON = 'SVC';
    case SYRIAN_POUND = 'SYP';
    case LILANGENI = 'SZL';
    case BAHT = 'THB';
    case SOMONI = 'TJS';
    case TUNISIAN_DINAR = 'TND';
    case PAANGA = 'TOP';
    case TURKISH_LIRA = 'TRY';
    case TRINIDAD_AND_TOBAGO_DOLLAR = 'TTD';
    case NEW_TAIWAN_DOLLAR = 'TWD';
    case TANZANIAN_SHILLING = 'TZS';
    case HRYVNIA = 'UAH';
    case UGANDA_SHILLING = 'UGX';
    case US_DOLLAR = 'USD';
    case PESO_URUGUAYO = 'UYU';
    case UZBEKISTAN_SUM = 'UZS';
    case VENEZUELAN_DIGITALvBOLIVAR = 'VED';
    case BOLIVAR_FUERTE = 'VEF';
    case BOLIVAR_SOBERANO = 'VES';
    case DONG = 'VND';
    case VATU = 'VUV';
    case TALA = 'WST';
    case CFA_FRANC_BEAC = 'XAF';
    case EAST_CARIBBEAN_DOLLAR = 'XCD';
    case CFA_FRANC_BCEAO = 'XOF';
    case CFP_FRANC = 'XPF';
    case YEMENI_RIAL = 'YER';
    case RAND = 'ZAR';
    case ZAMBIAN_KWACHA = 'ZMK';
    case ZIMBABWE_DOLLAR = 'ZWD';
}
