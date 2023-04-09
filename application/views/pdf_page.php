<?php
class PDF extends FPDF
{
	//Page header
    public $judul;
    public $lastY;
    public $limitPage = 31;
    var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
	function Header()
	{
                $this->setFont('Times','B',13);
                $this->setFillColor(255,255,255);
                
                $this->Ln(3);
                $this->cell(0,9,"PT. TELEVISI KAMPUS UNIVERSITAS DIAN NUSWANTORO",0,1,'C',1); 

                $this->setFont('Times','',9);
                $this->setFillColor(255,255,255);
                $this->cell(0,4,"Sekertariat : Gedung E Lt. 2 Kompleks UDINUS Jl. Nakula | No.5 - 11 Semarang 501313",0,1,'C',1);
                $this->cell(0,4,"Telp. 024 - 356 8491, Fax. 024-356 4645 | Email : tvku@tvku.tv | Homepage : http://www.tvku.tv",0,1,'C',1);


                
                $this->Image(base_url().'aset/tvku.png', 8, 13,'30','20','png');

                $this->SetLineWidth(0.4);
                $this->Line (8,34,202,34);
                
                $this->Ln(7);
                $this->setFont('Times','B',9);
                $this->setFillColor(255,255,255);
                $this->cell(0,6,$this->judul,0,1,'C',1); 
                $this->setFont('Times','',9);
                $this->cell(0,6,"PT. TELEVISI KAMPUS UNIVERSITAS DIAN NUSWANTORO",0,1,'C',1); 
                $this->Ln(6);
	}
 
	function Content($col_head , $col_size , $data_arr , $title)
	{ 

               
                $this->setFont('Times','',8);
                $this->setFillColor(230,230,200);
                //$this->cell(7,6,'No.',1,0,'C',1);

                
               for ($i=0; $i < count($col_head); $i++) 
               { 
                    $this->cell($col_size[$i],6,$col_head[$i],1,0,'C',1);   
               }

                $this->Ln();

                //$this->cell(7,5,1,1,0,'C',0);
                //$this->MultiCell (30,5,"halo sekarang saya sedang belajar",1,'L',0);
                $this->SetWidths($col_size);
                
                $no = 1;
                
                foreach ($data_arr as $data) 
                {
                    foreach ($data->result() as $val) 
                    {
                        $idx = 0;

                        //$this->cell(7,5,$no,1,0,'C',0);
                        $dat = array();
                        $dat[0] = $no;
                        $idx_in = 1;
                        foreach ($val as $col) 
                        {
                            $dat[$idx_in] = $col;
                            //$this->cell($col_size[$idx],5,$col,1,0,$idx==0 || $idx==2?'C':'L',0);    
                            $idx++;
                            $idx_in++;
                        }

                        $this->Row($dat);
                        
                        $no++;      
                        /*
                        if ($no%$this->limitPage == 0)
                        {
                            $this->AddPage();
                               for ($i=0; $i < count($col_head); $i++) 
                               { 
                                    $this->cell($col_size[$i],6,$col_head[$i],1,0,'C',1);   
                               }

                                $this->Ln();
                        }*/

                                            if ($this->getY() + 76 > 285)
                                            {
                                                 $this->AddPage();
                                                   for ($i=0; $i < count($col_head); $i++) 
                                                   { 
                                                        $this->cell($col_size[$i],6,$col_head[$i],1,0,'C',1);   
                                                   }

                                                    $this->Ln();
                                            }
                    }
                }




                $this->lastY = $this->getY();

	}

   
    function signature($name)
    {
                $this->Ln(3);
                $this->setFont('Times','B',8);
                // tanggal
                
                $this->cell(170,6,"Semarang , " . date('d F Y'),0,1,'R',0); 
                
                // jabatan
                $this->Ln(1);
                $this->cell(50,6,$name->jabatan1,0,0,'C',0); 
                $this->cell(80,6,"",0,0,'C',0); 
                $this->cell(50,6,$name->jabatan2,0,1,'C',0); 

                // nama
                $this->setFont('Times','BU',8);
                $this->Ln(13);
                $this->cell(50,4,$name->nama1,0,0,'C',0); 
                $this->cell(80,6,"",0,0,'C',0); 
                $this->cell(50,4,$name->nama2,0,1,'C',0); 
                
                // direktur
                $this->setFont('Times','B',8);
                //$this->Ln(1);
                $this->cell(0,5,"Mengetahui , ",0,1,'C',0); 
                $this->cell(0,5,$name->jabatan3,0,1,'C',0); 
                $this->Ln(13);

                $this->setFont('Times','BU',8);
                $this->cell(0,6,$name->nama3,0,1,'C',0); 
    }
    
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
        
		$this->SetY(-13); 
		//buat garis horizontal
		$this->Line(9,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'Televisi Kampus Udinus , Divisi IT , ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');

        //$pos = $this->getY();
        //$this->cell(170,6,"pos = " . $pos,0,1,'L',0); 
	}
}

$pdf = new PDF(); 
$pdf->judul = $title;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($colum_head , $colum_size , $data_tbl , $title);
//$pdf->coba();
$pdf->signature($sign_name);

$pdf->Output();