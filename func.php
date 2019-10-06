<?php

/**
 * Convert Functions
 */
function convert_non_persian_chars_to_persian ($str) {
    //main goal: arabic chars: from ؀ U+0600 (&#1536;) to ۿ U+06FF (&#1791;)
    //source: https://unicode-table.com/en
    $right_chars = array (
      'ا',
      'ب',
      'پ',
      'ت',
      'ث',
      'ج',
      'چ',
      'ح',
      'خ',
      'د',
      'ذ',
      'ر',
      'ز',
      'ژ',
      'س',
      'ش',
      'ص',
      'ض',
      'ط',
      'ظ',
      'ع',
      'غ',
      'ف',
      'ق',
      'ک',
      'گ',
      'ل',
      'م',
      'ن',
      'و',
      'ه',
      'ی',
      '‌', /* Zero Width Non-Joiner (nim fasele): U+200C (Unicode) or &#8204; (HTML) */
    );
    //first char of every array is right char
    $all_like_chars = array (
      $alef = array (
        'ا',
        'ݳ',
        'ݴ',
      ),
      $be = array (
        'ب',
        'ٻ',
        'ڀ',
        'ݑ',
        'ݔ',
        'ݕ',
        'ݖ',
      ),
      $pe = array (
        'پ',
        'ݐ',
        'ݒ',
        'ݓ',
      ),
      $te = array (
        'ت',
        'ٺ',
        'ټ',
        'ٽ',
        'ٿ',
      ),
      $se = array (
        'ث',
        'ٹ',
      ),
      $jim = array (
        'ج',
        'ڃ',
        'ڄ',
        'ݼ',
      ),
      $che = array (
        'چ',
        'ڇ',
        'ڿ',
        'ݘ',
        'ݮ',
        'ݯ',
      ),
      $he = array (
        'ح',
        'ځ',
        'ڂ',
        'څ',
        'ݗ',
      ),
      $khe = array (
        'خ',
        'ݲ',
      ),
      $dal = array (
        'د',
        'ڈ',
        'ډ',
        'ڊ',
        'ڋ',
        'ڌ',
        'ڍ',
        'ڎ',
        'ڏ',
        'ڐ',
        'ݙ',
        'ݚ',
        'ۮ',
      ),
      $zal = array (
        'ذ',
      ),
      $re = array (
        'ر',
        'ړ',
        'ڔ',
        'ڕ',
        'ږ',
        'ݛ',
        'ހ',
        'ۯ',
        'ڑ',
        'ڒ',
        'ݬ',
        'ݫ',
        'ڗ',
        'ڙ',
        'ݱ',
      ),
      $ze = array (
        'ز',
      ),
      $zhe = array (
        'ژ',
      ),
      $sin = array (
        'س',
        'ښ',
        'ڛ',
        'ݭ',
        'ݽ',
      ),
      $shin = array (
        'ش',
        'ݜ',
        'ڜ',
        'ݰ',
        'ݾ',
        'ۺ',
      ),
      $sad = array (
        'ص',
        'ڝ',
        'ڞ',
      ),
      $zad = array (
        'ض',
        'ۻ',
      ),
      $ta = array (
        'ط',
        'ڟ',
      ),
      $za = array (
        'ظ',
      ),
      $ain = array (
        'ع',
      ),
      $ghain = array (
        'غ',
        'ڠ',
        'ݝ',
        'ݞ',
        'ݟ',
        'ۼ',
      ),
      $fe = array (
        'ف',
        'ڡ',
        'ڢ',
        'ڣ',
        'ڤ',
        'ڥ',
        'ڦ',
        'ݠ',
        'ݡ',  
      ),
      $ghaf = array (
        'ق',
        'ٯ',
        'ڧ',
        'ڨ',
      ),
      $kaf = array (
        'ک',
        'ػ',
        'ؼ',
        'ك',
        'ڪ',
        'ګ',
        'ڬ',
        'ڭ',
        'ڮ',
        'ݢ',
        'ݣ',
        'ݤ',
        'ݿ',
      ),
      $gaf = array (
        'گ',
        'ڰ',
        'ڱ',
        'ڲ',
        'ڳ',
        'ڴ',
      ),
      $lam = array (
        'ل',
        'ڵ',
        'ڶ',
        'ڷ',
        'ڸ',
        'ݪ',
      ),
      $mim = array (
        'م',
        'ݥ',
        'ݦ',
        '۾',
      ),
      $noon = array (
        'ن',
        'ڹ',
        'ں',
        'ڻ',
        'ڼ',
        'ڽ',
        'ݧ',
        'ݨ',
        'ݩ',
      ),
      $vav = array (
        'و',
        'ٶ',
        'ٷ',
        'ۄ',
        'ۅ',
        'ۆ',
        'ۇ',
        'ۈ',
        'ۉ',
        'ۊ',
        'ۋ',
        'ۏ',
        'ݸ',
        'ݹ',
      ),
      $ha = array (
        'ه',
        'ھ',
        'ہ',
        'ۂ',
        'ۃ',
        'ە',
        'ۿ',
      ),
      $ye = array (
        'ی',
        'ؽ',
        'ؾ',
        'ؿ',
        'ي',
        'ٸ',
        'ۍ',
        'ێ',
        'ې',
        'ۑ',
        'ے',
        'ۓ',
        'ݵ',
        'ݶ',
        'ݷ',
        'ݺ',
        'ݻ',
      ),
      //32nd
      $nim_fasele = array (
        '‌', /* Zero Width Non-Joiner (nim fasele): U+200C (Unicode) or &#8204; (HTML) */
        '¬',
      ),
    );
    for ($i = 0; $i <= 32; $i++) {
      $str = str_replace ($all_like_chars[$i], $right_chars[$i], $str);
    }
    return $str;
  }

  /**
   * Reverse Functions 
   */
  function string_reverse_utf8 ($str){ 
      preg_match_all('/./us', $str, $ar); 
      return join('', array_reverse($ar[0])); 
  }
  function string_reverse_non_persian_words_in_persian_text ($str) {
      $exploded_string = explode (" ",$str);
      foreach ($exploded_string as &$word) {
      preg_match ('/[a-zA-Z0-9]/', $word, $matches, PREG_UNMATCHED_AS_NULL);
      if ( ! empty ($matches) ) {
          $word = htmlspecialchars(strrev ($word));
          }
      }
      return implode (" ", $exploded_string);
  }
  
  function string_reverse_persian_text ($str) {
      return convert_non_persian_chars_to_persian(string_reverse_non_persian_words_in_persian_text(string_reverse_utf8($str)));
  }

  function string_reverse_persian_file ($file_name) {
    $file = file ($file_name);

    foreach ($file as &$line) {
        $line = edit_str ($line);
        echo $line."\n";
    }
    file_put_contents("output.txt", implode("\n", $file));
  }