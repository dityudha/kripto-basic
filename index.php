<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Kriptografi Sederhana</title>
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box" style="width:400px">
     <div class="register-logo">
      <a href="#"><b><br>Aplikasi Web Based 
      <br>Kriptografi</br></b> Caesar Chiper</a>
     </div>
       
  <div class="box box-info">
      
      <?php
	// Fungsi algoritma caesar chiper untuk form 1	
	if(isset($_POST['submit1'])){
            function Cipher($ch, $key)
            {
                if (!ctype_alpha($ch))
                        return $ch;
                // Fungsi menambah 1 karakter pada plaintext
                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                // Penambahan offset dari 26 huruf abjad di geser 1 karakater
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
            }

            // Fungsi enchiper plaintext pada form 1
            function Encipher($input, $key)
            {
                $output = "";

                $inputArr = str_split($input);
                foreach ($inputArr as $ch)
                        $output .= Cipher($ch, $key);

                return $output;
            }

            // Fungsi dechiper plaintext pada form 1
            function Decipher($input, $key)
            {
                    return Encipher($input, 26 - $key);
            }
            
        // Fungsi algoritma caesar chiper untuk form 2	    
        }else if(isset($_POST['submit2'])){
            function Cipher($ch, $key)
            {
                if (!ctype_alpha($ch))
                        return $ch;
                // Fungsi menambah 1 karakter pada plaintext
                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                // Penambahan offset dari 26 huruf abjad di geser 1 karakater
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
            }

            // Fungsi enchiper plaintext pada form 2
            function Encipher($input, $key)
            {
                $output = "";

                $inputArr = str_split($input);
                foreach ($inputArr as $ch)
                        $output .= Cipher($ch, $key);

                return $output;
            }

            // Fungsi dechiper plaintext pada form 2
            function Decipher($input, $key)
            {
                    return Encipher($input, 26 - $key);
            }
        }
        ?>
      
    <br>
    <p class="login-box-msg" style="font-size:20px !important"><b></b></p>    
            <form name="enkripsi" method="post">

              <!-- Fungsi untuk merubah tampilan pada box input text -->
              <div class="box-body">
                    <div class="form-group">
                    <label>Input Teks</label>
                    <textarea name="plain" required="true" oninvalid="this.setCustomValidity('Text tidak boleh kosong!')" 
                     oninput="setCustomValidity('')" type="text" class="form-control" rows="2" placeholder="Input teks disini"></textarea>            
                    </div>

             <!-- Fungsi untuk merubah tampilan pada box input key -->
                    <div class="form-group">
                    <label>Input Panjang Key</label>
                    <input title="Pilih Key." required="true" oninvalid="this.setCustomValidity('Key tidak boleh kosong!')" 
                     oninput="setCustomValidity('')" type="number" class="form-control" name="metode" placeholder="Input panjang key disini">
                    </div>    
              </div> 

              <!-- Table enkripsi dan dekripsi -->
              <div class="box-footer">
                  <table class="table table-stripped">
                      <tr>
                          <td><input type="submit" name="submit1" value="Enkripsi" style="width: 100%"></td>
                          <td><input type="submit" name="submit2" value="Dekripsi" style="width: 100%"></td>
                      </tr>
                  </table>
              </div>
            
            </form>
              <div class="box-body">
              <!-- Fungsi untuk memanggil dan menampilkan hasil enkripsi -->
                  <label>Hasil Enkripsi</label>
                  <table class="table table-bordered">
                      <tr style="background-color:#98c1ff">
                          <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo Encipher($_POST['plain'], $_POST['metode']);} 
                          if (isset($_POST['submit2'])){ echo Decipher($_POST['plain'], $_POST['metode']);}?></b></td>
                      </tr>
                  </table>
                  <!-- Fungsi untuk memanggil dan menampilkan teks asli sebelum di enkripsi -->
                  <label>Teks Asli</label>
                  <table class="table table-bordered">
                      <tr style="background-color:#98c1ff">
                          <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo Decipher(Encipher($_POST['plain'], $_POST['metode']),$_POST['metode']);} 
                          if (isset($_POST['submit2'])){ echo Encipher(Decipher($_POST['plain'], $_POST['metode']),$_POST['metode']);}?></b></td>
                      </tr>
                  </table>
                  <!-- Fungsi untuk memanggil dan menampilkan panjang key pada saat enkripsi -->
                  <label>Panjang Key</label>
                  <table class="table table-bordered">
                      <tr style="background-color:#ff5e61">
                          <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo $_POST['metode'];} 
                          if (isset($_POST['submit2'])){ echo $_POST['metode'];}?></b></td>
                      </tr>
                  </table>
        <br>
        <br>
                </div>
        </div>


<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
</body>
</html>




