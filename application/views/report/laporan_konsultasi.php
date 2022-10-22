<?php
        error_reporting(0);
        $pdf = new FPDF('P', 'mm','Letter');
        $pdf->SetTitle('KOP SURAT');
 
        $pdf->AddPage();

        $pdf->Image('assets/images/logo_demak.png',20,10,20,25);
        $pdf->judul('PEMERINTAH KABUPATEN DEMAK','I N S P E K T O R A T','Jl. Kyai Mugni No. 1018 Demak Kode Pos 59511 Telepon (0291) 6912113','Faks. (0291) 685405  e-mail : inspektorat@demakkab.go.id');
        $pdf->garis();

        //KONTEN
        $pdf->SetFont('times','B','14');
        $pdf->Cell(0,5,'',0,1,'C'); // ENTER
        $pdf->SetFont('times','B','14');
        $pdf->Cell(0,10,'LAPORAN HASIL KONSULTASI ONLINE',0,1,'C');
        $pdf->Cell(60);
        $pdf->Cell(0,10,'Nomor :'.$no_urut.'/'.$nomor,0,1,'L');
        $pdf->SetFont('times','','12');
        $pdf->Cell(0,10,'',0,1,'C'); // ENTER
        $pdf->Cell(20);
        $teks = "Pada hari ini $hari tanggal $tanggal bulan $bulan tahun $tahun kami Inspektorat";
        $teks1 = "Pada hari ini $hari tanggal $tanggal bulan $bulan tahun $tahun kami";
        $teks2 = "Pada hari ini $hari tanggal $tanggal bulan $bulan tahun $tahun";
        $cellwidth = 190;
        $jumlah_panjang = $pdf->GetStringWidth($teks);
        if($pdf->GetStringWidth($teks) < 160){
            $text_length = strlen($teks);
            $pdf->MultiCell(0,6,$teks,0,'J');
        }else{
            $text_length = strlen($teks);
            if($text_length < 115){
                $pdf->MultiCell(0,6,$teks1,0,'J');
                $pdf->Cell(10);
                $pdf->MultiCell(0,6,'Inspektorat Kabupaten Demak  melalui Irban Wilayah '.$irban.' telah menerima konsultasi online Dinas/ Instansi/ Lembaga ' .$opd. ' dengan hasil sebagai berikut :',0,'J',0,'J');
            }else{
                $pdf->MultiCell(0,6,$teks2,0,'J');
                $pdf->Cell(10);
                $pdf->MultiCell(0,6,'kami Inspektorat Kabupaten Demak  melalui Irban Wilayah '.$irban.' telah menerima konsultasi online Dinas/ Instansi/ Lembaga ' .$opd. ' dengan hasil sebagai berikut :',0,'J' ,0,'J');   
            }
        }
        //=======================//
        $pdf->Cell(10);
        $pdf->SetFont('times','B','12');
        $pdf->Cell(0,10,'A. Tujuan Konsultasi :',0,1,'L');
        $pdf->Cell(15);
        $pdf->SetFont('times','','12');
        $pdf->Cell(0,6,$permasalahan_name,0,1,'L');
        $pdf->Cell(10);
        $pdf->SetFont('times','B','12');
        $pdf->Cell(0,6,'B. Pelaksanaan Konsultasi :',0,1,'L');
        $pdf->Cell(15);
        $pdf->SetFont('times','','12');
        $pdf->Cell(0,6,'1. Personil Dinas/Instansi/Lembaga :',0,1,'L');
        $w = array(10, 100, 40);
        $header = array('No.', 'Nama', 'Jabatan');
                $pdf->Cell(20);
            for($i=0;$i<count($header);$i++)
                $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
                $pdf->Ln();
                $pdf->Cell(20);
                $pdf->Cell($w[0],7,'1',1,0,'L');
                $pdf->Cell($w[1],7,$nama_konsul,1,0,'L');
                $pdf->Cell($w[2],7,'',1,0,'C');
                $pdf->Ln();
                $pdf->Cell(20);
                $pdf->Cell($w[0],7,'',1,0,'C');
                $pdf->Cell($w[1],7,'',1,0,'C');
                $pdf->Cell($w[2],7,'',1,0,'C');
                $pdf->Ln();
                $pdf->Cell(20);
                $pdf->Cell($w[0],7,'',1,0,'C');
                $pdf->Cell($w[1],7,'',1,0,'C');
                $pdf->Cell($w[2],7,'',1,0,'C');
        $pdf->Ln();
        $pdf->Cell(15);
        $pdf->SetFont('times','','12');
        $pdf->Cell(0,10,'2. Inspektorat Kabupaten Demak',0,1,'L');
            $pdf->Cell(20);
            for($i=0;$i<count($header);$i++)
                $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
                $pdf->Ln();
                $pdf->Cell(20);
                $pdf->Cell($w[0],7,'',1,0,'C');
                $pdf->Cell($w[1],7,'',1,0,'C');
                $pdf->Cell($w[2],7,'',1,0,'C');
                $pdf->Ln();
                $pdf->Cell(20);
                $pdf->Cell($w[0],7,'',1,0,'C');
                $pdf->Cell($w[1],7,'',1,0,'C');
                $pdf->Cell($w[2],7,'',1,0,'C');
                $pdf->Ln();
                $pdf->Cell(20);
                $pdf->Cell($w[0],7,'',1,0,'C');
                $pdf->Cell($w[1],7,'',1,0,'C');
                $pdf->Cell($w[2],7,'',1,0,'C');
        $pdf->Ln();

        $pdf->Cell(0,6,'',0,1,'C'); // ENTER
        $pdf->Cell(10);
        $pdf->SetFont('times','B','12');
        $pdf->Cell(0,10,'C. Permasalahan yang dikonsultasikan :',0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(0,6,'1. '.$permasalahan_name,0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(0,6,'2. .................................',0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(0,6,'3. .................................',0,1,'L');

        $pdf->Cell(10);
        $pdf->SetFont('times','B','12');
        $pdf->Cell(0,10,'D.  Penyelesaian/ Solusi Permasalahan yang diberikan :',0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(0,6,'1. '.$jawaban,0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(0,6,'2. .................................',0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(0,6,'3. .................................',0,1,'L');

        $pdf->Cell(0,10,'',0,1,'C'); // ENTER
        $pdf->Cell(10);
        $pdf->SetFont('times','B','12');
        $pdf->Cell(0,10,'Catatan :',0,1,'L');
        $pdf->Cell(10);
        $pdf->SetFont('times','','12');
        $pdf->MultiCell(0,6,'Konsultasi ini sebagai salah satu pelaksanaan tugas pokok dan fungsi Inspektorat Kabupaten Demak sesuai peraturan perundang-undangan yang hasilnya merupakan pertimbangan dalam penyelesaian permasalahan yang dikonsultasikan bukan sebagai fatwa ketentuan yang harus dilaksanakan oleh Dinas/ Instansi/ Lembaga yang berkonsultasi',0,'J');

        $pdf->Cell(30);
        $pdf->SetFont('times','','12');
        $pdf->MultiCell(0,6,'Demikian hasil konsultasi (Consulting) yang telah kami laksanakan untuk dapat digunakan',0,'J'); 
        $pdf->Cell(10);
        $pdf->SetFont('times','','12');
        $pdf->Cell(0,6,'sebagaimana mestinya :',0,1,'L');

        $pdf->Cell(0,10,'',0,1,'C'); // ENTER
        $pdf->Cell(10);
        $pdf->SetFont('times','','12');
        $pdf->Cell(88,6,'Yang berkonsultasi ',1,0,'C'); 
        $pdf->Cell(88,6,'Irban Wilayah ... ',1,1,'C'); 
        $pdf->Cell(10);
        $pdf->Cell(88,20,'',1,0,'C',false); 
        $pdf->Cell(88,20,'',1,1,'C',false); 
        $pdf->Cell(10);
        $pdf->SetFont('times','','12');
        $pdf->Cell(88,6,'(............................)',1,0,'C'); 
        $pdf->Cell(88,6,'(............................)',1,1,'C');       
        $pdf->Output();
	

?>