<?
if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname=$_FILES["image1"]["name"];
		  $fsize=$_FILES["image1"]["size"];
		  $newfname="m";
		  if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
			  "경로/" . $newfname)) exit("업로드 실패");

		  echo("파일이름 : $newfname<br> 파일크기 : $fsize");
	  }
?>