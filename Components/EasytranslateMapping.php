<?php

namespace Easytranslate\Components;

use Doctrine\ORM\NonUniqueResultException;
use Shopware\Components\Model\QueryBuilder;
use Shopware\Models\Shop\Locale;
use Shopware\Models\Shop\Shop;

/**
 * Class EasytranslateMapping
 * @package Easytranslate\Components
 */
class EasytranslateMapping
{
    const LOCALE_SHOPWARE_EASYTRANSLATE_SOURCE = [
        "de_DE" => "de",
        "en_GB" => "en",
        "aa_DJ" => "aa",
        "aa_ER" => "aa",
        "aa_ET" => "aa",
        "af_NA" => "af",
        "af_ZA" => "af",
        "am_ET" => "am",
        "ar_AE" => "ar",
        "ar_BH" => "ar",
        "ar_DZ" => "ar",
        "ar_EG" => "ar",
        "ar_IQ" => "ar",
        "ar_JO" => "ar",
        "ar_KW" => "ar",
        "ar_LB" => "ar",
        "ar_LY" => "ar",
        "ar_MA" => "ar",
        "ar_OM" => "ar",
        "ar_QA" => "ar",
        "ar_SA" => "ar",
        "ar_SD" => "ar",
        "ar_SY" => "ar",
        "ar_TN" => "ar",
        "ar_YE" => "ar",
        "az_AZ" => "az",
        "be_BY" => "be",
        "bg_BG" => "bg",
        "bn_BD" => "bn",
        "bn_IN" => "bn",
        "bo_CN" => "bo",
        "bo_IN" => "bo",
        "bs_BA" => "bs",
        "byn_ER" => "byn",
        "ca_ES" => "ca",
        "cs_CZ" => "cs",
        "cy_GB" => "cy",
        "da_DK" => "da",
        "de_AT" => "de",
        "de_BE" => "de",
        "de_CH" => "de",
        "de_LI" => "de",
        "de_LU" => "de",
        "dv_MV" => "dv_MV",
        "dz_BT" => "dz",
        "el_CY" => "el",
        "el_GR" => "el",
        "en_AS" => "en",
        "en_AU" => "en",
        "en_BE" => "en",
        "en_BW" => "en",
        "en_BZ" => "en",
        "en_CA" => "en",
        "en_GU" => "en",
        "en_HK" => "en",
        "en_IE" => "en",
        "en_IN" => "en",
        "en_JM" => "en",
        "en_MH" => "en",
        "en_MP" => "en",
        "en_MT" => "en",
        "en_NA" => "en",
        "en_NZ" => "en",
        "en_PH" => "en",
        "en_PK" => "en",
        "en_SG" => "en",
        "en_TT" => "en",
        "en_UM" => "en",
        "en_US" => "en",
        "en_VI" => "en",
        "en_ZA" => "en",
        "en_ZW" => "en",
        "es_AR" => "es",
        "es_BO" => "es",
        "es_CL" => "es",
        "es_CO" => "es",
        "es_CR" => "es",
        "es_DO" => "es",
        "es_EC" => "es",
        "es_ES" => "es",
        "es_GT" => "es",
        "es_HN" => "es",
        "es_MX" => "es",
        "es_NI" => "es",
        "es_PA" => "es",
        "es_PE" => "es",
        "es_PR" => "es",
        "es_PY" => "es",
        "es_SV" => "es",
        "es_US" => "es",
        "es_UY" => "es",
        "es_VE" => "es",
        "et_EE" => "et",
        "eu_ES" => "eu",
        "fa_AF" => "fa",
        "fa_IR" => "fa_IR",
        "fi_FI" => "fi",
        "fil_PH" => "fil",
        "fo_FO" => "fo",
        "fr_BE" => "fr",
        "fr_CA" => "fr",
        "fr_CH" => "fr",
        "fr_FR" => "fr",
        "fr_LU" => "fr",
        "fr_MC" => "fr",
        "fr_SN" => "fr",
        "gl_ES" => "gl",
        "gu_IN" => "gu",
        "ha_GH" => "ha",
        "ha_NE" => "ha",
        "ha_NG" => "ha",
        "ha_SD" => "ha",
        "haw_US" => "ha",
        "he_IL" => "he",
        "hi_IN" => "hi",
        "hr_HR" => "hr",
        "hu_HU" => "hu",
        "hy_AM" => "hy",
        "id_ID" => "id",
        "ig_NG" => "ig",
        "is_IS" => "is",
        "it_CH" => "it",
        "it_IT" => "it",
        "ja_JP" => "ja",
        "ka_GE" => "ka",
        "kaj_NG" => "ka",
        "kam_KE" => "ka",
        "kk_KZ" => "kk",
        "kl_GL" => "kl",
        "km_KH" => "km",
        "kn_IN" => "kn",
        "ko_KR" => "ko",
        "kok_IN" => "ko",
        "ln_CD" => "ln",
        "ln_CG" => "ln",
        "lo_LA" => "lo",
        "lt_LT" => "lt",
        "lv_LV" => "lv",
        "mk_MK" => "mk",
        "ml_IN" => "ml",
        "mn_MN" => "mn_MN",
        "mr_IN" => "mr",
        "ms_BN" => "ms",
        "ms_MY" => "ms",
        "mt_MT" => "mt",
        "my_MM" => "my",
        "nb_NO" => "nb_NO",
        "ne_NP" => "ne_NP",
        "nl_NL" => "nl_NL",
        "nn_NO" => "nn_NO",
        "om_ET" => "om",
        "om_KE" => "om",
        "pa_IN" => "pa",
        "pa_PK" => "pa",
        "pl_PL" => "pl",
        "ps_AF" => "ps",
        "pt_BR" => "pt",
        "pt_PT" => "pt",
        "ro_MD" => "ro_MD",
        "ro_RO" => "ro",
        "ru_RU" => "ru",
        "ru_UA" => "ru",
        "rw_RW" => "rw",
        "se_FI" => "se_FI",
        "si_LK" => "si_LK",
        "sk_SK" => "sk",
        "sl_SI" => "sl",
        "so_DJ" => "so",
        "so_ET" => "so",
        "so_KE" => "so",
        "so_SO" => "so",
        "sq_AL" => "sq",
        "sr_BA" => "sr",
        "sr_CS" => "sr",
        "sr_ME" => "sr",
        "sr_RS" => "sr",
        "sr_YU" => "sr",
        "st_LS" => "st",
        "st_ZA" => "st",
        "sv_FI" => "sv",
        "sv_SE" => "sv",
        "sw_KE" => "sw",
        "sw_TZ" => "sw",
        "ta_IN" => "ta",
        "te_IN" => "te",
        "th_TH" => "th",
        "ti_ER" => "ti",
        "ti_ET" => "ti",
        "tig_ER" => "tig",
        "tr_TR" => "tr",
        "uk_UA" => "uk",
        "ur_IN" => "ur",
        "ur_PK" => "ur",
        "uz_AF" => "uz",
        "uz_UZ" => "uz",
        "vi_VN" => "vi",
        "wo_SN" => "wo",
        "yo_NG" => "yo",
        "zh_CN" => "zh_CN",
        "zh_HK" => "zh_HK",
        "zu_ZA" => "zu"
    ];

    const LOCALE_SHOPWARE_EASYTRANSLATE_TARGET = [
        "de_DE" => "de",
        "en_GB" => "en_US",
        "aa_DJ" => "aa",
        "aa_ER" => "aa",
        "aa_ET" => "aa",
        "af_NA" => "af",
        "af_ZA" => "af",
        "am_ET" => "am",
        "ar_AE" => "ar",
        "ar_BH" => "ar",
        "ar_DZ" => "ar",
        "ar_EG" => "ar_EG",
        "ar_IQ" => "ar",
        "ar_JO" => "ar",
        "ar_KW" => "ar",
        "ar_LB" => "ar",
        "ar_LY" => "ar",
        "ar_MA" => "ar_MA",
        "ar_OM" => "ar",
        "ar_QA" => "ar",
        "ar_SA" => "ar",
        "ar_SD" => "ar_SD",
        "ar_SY" => "ar_SY",
        "ar_TN" => "ar",
        "ar_YE" => "ar",
        "az_AZ" => "az",
        "be_BY" => "be",
        "bg_BG" => "bg",
        "bn_BD" => "bn",
        "bn_IN" => "bn",
        "bo_CN" => "bo",
        "bo_IN" => "bo",
        "bs_BA" => "bs",
        "byn_ER" => "byn",
        "ca_ES" => "ca",
        "cs_CZ" => "cs",
        "cy_GB" => "cy",
        "da_DK" => "da",
        "de_AT" => "de",
        "de_BE" => "de",
        "de_CH" => "de",
        "de_LI" => "de",
        "de_LU" => "de",
        "dv_MV" => "dv_MV",
        "dz_BT" => "dz",
        "el_CY" => "el",
        "el_GR" => "el",
        "en_AU" => "en_AU",
        "en_US" => "en_US",
        "en_ZA" => "en_ZA",
        "es_ES" => "es_ES",
        "es_MX" => "es_MX",
        "et_EE" => "et",
        "eu_ES" => "eu",
        "fa_AF" => "fa",
        "fa_IR" => "fa_IR",
        "fi_FI" => "fi",
        "fil_PH" => "fil",
        "fo_FO" => "fo",
        "fr_LU" => "lb",
        "fr_BE" => "fr_BE",
        "fr_CA" => "fr_CA",
        "fr_CH" => "fr_CH",
        "fr_FR" => "fr_FR",
        "gl_ES" => "gl",
        "gu_IN" => "gu",
        "ha_GH" => "ha",
        "ha_NE" => "ha",
        "ha_NG" => "ha",
        "ha_SD" => "ha",
        "haw_US" => "ha",
        "he_IL" => "he",
        "hi_IN" => "hi",
        "hr_HR" => "hr",
        "hu_HU" => "hu",
        "hy_AM" => "hy",
        "id_ID" => "id",
        "ig_NG" => "ig",
        "is_IS" => "is",
        "it_CH" => "it_CH",
        "it_IT" => "it_IT",
        "ja_JP" => "ja",
        "ka_GE" => "ka",
        "kaj_NG" => "ka",
        "kam_KE" => "ka",
        "kk_KZ" => "kk",
        "kl_GL" => "kl",
        "km_KH" => "km",
        "kn_IN" => "kn",
        "ko_KR" => "ko",
        "kok_IN" => "ko",
        "ln_CD" => "ln",
        "ln_CG" => "ln",
        "lo_LA" => "lo",
        "lt_LT" => "lt",
        "lv_LV" => "lv",
        "mk_MK" => "mk",
        "ml_IN" => "ml",
        "mn_MN" => "mn_MN",
        "mr_IN" => "mr",
        "ms_BN" => "ms",
        "ms_MY" => "ms",
        "mt_MT" => "mt",
        "my_MM" => "my",
        "nb_NO" => "nb_NO",
        "ne_NP" => "ne_NP",
        "nl_BE" => "nl_BE",
        "nl_NL" => "nl_NL",
        "nn_NO" => "nb_NO",
        "om_ET" => "om",
        "om_KE" => "om",
        "pa_IN" => "pa",
        "pa_PK" => "pa",
        "pl_PL" => "pl",
        "ps_AF" => "ps",
        "pt_BR" => "pt_BR",
        "pt_PT" => "pt_PT",
        "ro_MD" => "ro_MD",
        "ro_RO" => "ro_RO",
        "ru_RU" => "ru",
        "ru_UA" => "ru",
        "rw_RW" => "rw",
        "se_FI" => "se_FI",
        "si_LK" => "si_LK",
        "sk_SK" => "sk",
        "sl_SI" => "sl",
        "so_DJ" => "so",
        "so_ET" => "so",
        "so_KE" => "so",
        "so_SO" => "so",
        "sq_AL" => "sq",
        "sr_BA" => "sr",
        "sr_CS" => "sr",
        "sr_ME" => "sr_ME",
        "sr_RS" => "sr",
        "sr_YU" => "sr",
        "st_LS" => "st",
        "st_ZA" => "st",
        "sv_FI" => "sv",
        "sv_SE" => "sv",
        "sw_KE" => "sw",
        "sw_TZ" => "sw",
        "ta_IN" => "ta",
        "te_IN" => "te",
        "th_TH" => "th",
        "ti_ER" => "ti",
        "ti_ET" => "ti",
        "tig_ER" => "tig",
        "tr_TR" => "tr",
        "uk_UA" => "uk",
        "ur_IN" => "ur",
        "ur_PK" => "ur",
        "uz_AF" => "uz",
        "uz_UZ" => "uz",
        "vi_VN" => "vi",
        "wo_SN" => "wo",
        "yo_NG" => "yo",
        "zh_CN" => "zh_CN",
        "zh_HK" => "zh_HK",
        "zh_TW" => "zh_TW",
        "zu_ZA" => "zu"
    ];

    /**
     * @param $em
     * @param $locale
     * @return Shop
     * @throws NonUniqueResultException
     */
    public static function getShopForLocale($em, $locale): Shop {

        $localeId = self::getLocaleForLocale($em, $locale)->getId();

        /** @var QueryBuilder $builder */
        $builder = $em->getRepository(Shop::class)->createQueryBuilder('shop')
            ->setFirstResult(0)
            ->setMaxResults(1)
            ->addFilter(['locale' => $localeId]
            );

        /** @var Shop $shop */
        return $builder->getQuery()->getOneOrNullResult();
    }

    /**
     * @param $em
     * @param $locale
     * @return Locale
     * @throws NonUniqueResultException
     */
    public static function getLocaleForLocale($em, $locale): Locale {

        /** @var QueryBuilder $builder */
        $builder = $em->getRepository(Locale::class)->createQueryBuilder('locale')
            ->setFirstResult(0)
            ->setMaxResults(1)
            ->addFilter(['locale' => $locale]
            );

        /** @var Locale $localeEntity */
        return $builder->getQuery()->getOneOrNullResult();

    }

    /**
     * @param $em
     * @param $shop
     * @return string
     */
    public static function getSourceLocaleFromShop($em, $shop): string {
        return EasytranslateMapping::LOCALE_SHOPWARE_EASYTRANSLATE_SOURCE[$shop->getLocale()->getLocale()];
    }

    /**
     * @param $em
     * @param $shop
     * @return string
     */
    public static function getTargetLocaleFromShop($em, $shop): string {
        return EasytranslateMapping::LOCALE_SHOPWARE_EASYTRANSLATE_TARGET[$shop->getLocale()->getLocale()];
    }

}
