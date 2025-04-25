<?php

namespace App;


namespace App\Enums;

enum Wilaya: string
{
    case Adrar = 'Adrar';
    case Chlef = 'Chlef';
    case Laghouat = 'Laghouat';
    case OumElBouaghi = 'Oum El Bouaghi';
    case Batna = 'Batna';
    case Bejaia = 'Bejaia';
    case Biskra = 'Biskra';
    case Bechar = 'Bechar';
    case Blida = 'Blida';
    case Bouira = 'Bouira';
    case Tamanrasset = 'Tamanrasset';
    case Tebessa = 'Tebessa';
    case Tlemcen = 'Tlemcen';
    case Tiaret = 'Tiaret';
    case TiziOuzou = 'Tizi Ouzou';
    case Alger = 'Alger';
    case Djelfa = 'Djelfa';
    case Jijel = 'Jijel';
    case Setif = 'Setif';
    case Saida = 'Saida';
    case Skikda = 'Skikda';
    case SidiBelAbbes = 'Sidi Bel Abbes';
    case Annaba = 'Annaba';
    case Guelma = 'Guelma';
    case Constantine = 'Constantine';
    case Medea = 'Medea';
    case Mostaganem = 'Mostaganem';
    case Msila = 'Msila';
    case Mascara = 'Mascara';
    case Ouargla = 'Ouargla';
    case Oran = 'Oran';
    case ElBayadh = 'El Bayadh';
    case Illizi = 'Illizi';
    case BordjBouArreridj = 'Bordj Bou Arreridj';
    case Boumerdes = 'Boumerdes';
    case ElTarf = 'El Tarf';
    case Tindouf = 'Tindouf';
    case Tissemsilt = 'Tissemsilt';
    case ElOued = 'El Oued';
    case Khenchela = 'Khenchela';
    case SoukAhras = 'Souk Ahras';
    case Tipaza = 'Tipaza';
    case Mila = 'Mila';
    case Aindefla = 'Ain Defla';
    case Naama = 'Naama';
    case AinTemouchent = 'Ain Temouchent';
    case Ghardaia = 'Ghardaia';
    case Relizane = 'Relizane';
    case Timimoun = 'Timimoun';
    case BordjBadjiMokhtar = 'Bordj Badji Mokhtar';
    case OuledDjellal = 'Ouled Djellal';
    case BeniAbbes = 'Beni Abbes';
    case InSalah = 'In Salah';
    case InGuezzam = 'In Guezzam';
    case Touggourt = 'Touggourt';
    case Djanet = 'Djanet';
    case ElMghair = 'El Mghair';
    case ElMenia = 'El Menia';

    public static function asArray(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
