<?php
if(isset($_POST["action"]))
{
    if($_POST["action"] =="fetch"){
        $folders = glob('uploads/*');
        $output = '
        <table class="table table-borderless table-hover">
        <tr>
            <th>Subjects or Branch</th>
            <th>Type</th>
        </tr>
        ';
        if(count($folders) >0 ){
            foreach($folders as $path_name_folder){
                $namearr = explode('/',$path_name_folder);
                $name = end($namearr);
                $output .= '
                <tr>
                <td style="width:70%;">'.$name.'</td>';
                if(is_dir($path_name_folder)){  
                 $output .='
                <td>Folder</td>
                <td><button style="width:120px;" type="button" name="open" 
                data-adr="'.$path_name_folder.'" class="open  btn btn-success btn-xs">Open</button></td>
                </tr>
                ';
                }
                else{
                $data = mime_content_type($path_name_folder);
                $ar = explode('/',$data);
                $type = end($ar);
                $output .='
                <td>'.$type.'</td>
                <td><button style="width:120px;" type="button" name="file" 
                data-adr="'.$path_name_folder.'" class="file  btn btn-primary btn-xs">View file</button></td>
                </tr>
                ';
                }
            }
        }
        else{
            $output .= '
            <tr>
                <td colspan="2">No Folder Found</td>
            </tr>
            ';
        }
        $output .= '</table>';
        $out = $output;
        echo $output;
    }
    if($_POST["action"] == "open"){
        $folders = glob($_POST["folder_name"].'/*');
        $linkname = $_POST["folder_name"];
        $arr1 = explode('/',$linkname);
        $tmp = "";
        foreach($arr1 as $tmpname){
            if($tmpname == "uploads"){
                $tmp .= 'Subject or Branch'.'/';
            }
            else{
                $tmp .= $tmpname.'/';
            }
        }
        $head = $tmp;
        $arr2 = explode('/',$linkname);      
        $length = count($arr2);
        \array_splice($arr2,$length-1,1);
        $lengthnew = count($arr2);
        $tmp2='';
        for ($x = 0; $x <$lengthnew ; $x++) {
            if($x == $lengthnew-1){
                $tmp2 .= $arr2[$x];
            }
            else{
                $tmp2 .= $arr2[$x].'/';
            }
        }
        $back = $tmp2;
        $arr3 = explode('/',$back);      
        $no = count($arr3);
        $output = '
        <table class="table table-borderless table-hover">
        <tr>
            <th>'.$head.'</th>
            <th>Type</th>
            <th><button style="width:120px;" type="button" name="back" data-adr="'.$back.','.$no.'" 
            class="back  btn btn-warning btn-xs">Back</button></th>
        </tr>
        ';
        if(count($folders) >0 ){
            foreach($folders as $path_name_folder){
                $namearr = explode('/',$path_name_folder);
                $name = end($namearr);
                $output .= '
                <tr>
                <td style="width:70%;">'.$name.'</td>';
                if(is_dir($path_name_folder)){  
                $output .='
                <td>Folder</td>
                <td><button style="width:120px;" type="button" name="open" data-adr="'.$path_name_folder.'" 
                class="open  btn btn-success btn-xs">Open</button></td>
                </tr>
                ';
                }
                else{
                $data = mime_content_type($path_name_folder);
                $ar = explode('/',$data);
                $type = end($ar);
                $output .='
                <td>'.$type.'</td>
                <td><button style="width:120px;" type="button" name="file" 
                data-adr="'.$path_name_folder.'" class="file  btn btn-primary btn-xs">View file</button></td>
                </tr>
                ';
                }
            }
        }
        else{
            $output .= '
            <tr>
                <td colspan="2">No Folder Found</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
    if($_POST["action"] == "search"){
        $string = $_POST["str"];
        global $out;
        if(empty($string)){
        $folders = glob('uploads/*');
        $output = '
        <table class="table table-borderless table-hover">
        <tr>
            <th>Subjects or Branch</th>
            <th>Type</th>
        </tr>
        ';
        if(count($folders) >0 ){
            foreach($folders as $path_name_folder){
                $namearr = explode('/',$path_name_folder);
                $name = end($namearr);
                $output .= '
                <tr>
                <td style="width:70%;">'.$name.'</td>';
                if(is_dir($path_name_folder)){  
                 $output .='
                <td>Folder</td>
                <td><button style="width:120px;" type="button" name="open" 
                data-adr="'.$path_name_folder.'" class="open  btn btn-success btn-xs">Open</button></td>
                </tr>
                ';
                }
                else{
                $data = mime_content_type($path_name_folder);
                $ar = explode('/',$data);
                $type = end($ar);
                $output .='
                <td>'.$type.'</td>
                <td><button style="width:120px;" type="button" name="file" 
                data-adr="'.$path_name_folder.'" class="file  btn btn-primary btn-xs">View file</button></td>
                </tr>
                ';
                }
            }
        }
        else{
            $output .= '
            <tr>
                <td colspan="2">No Folder Found</td>
            </tr>
            ';
        }
        $output .= '</table>';
        }
        else{
        $output = '
        <table class="table table-borderless table-hover">
        <tr>
            <th>Subjects or Branch</th>
            <th>Type</th>
        </tr>
        ';
        function recur($folder){
            $folders = glob($folder.'/*');
            if(count($folders) >0 ){
                foreach($folders as $file){
                    if(is_file($file)){
                        global $output, $string;                    
                        if(strstr($file , $string)){
                        $namearr = explode('/',$file);
                        $name = end($namearr);                          
                        $output .= '
                        <tr>
                        <td style="width:70%;">'.$name.'</td>';
                        $data = mime_content_type($file);
                        $ar = explode('/',$data);
                        $type = end($ar);
                        $output .='
                        <td>'.$type.'</td>
                        <td><button style="width:120px;" type="button" name="file" 
                        data-adr="'.$file.'" class="file  btn btn-primary btn-xs">View file</button></td>
                        </tr>
                        ';
                        }
                    }
                    else{
                        recur($file);
                    }
                }
            }
        }
        $folder = 'uploads';
        recur($folder);
        $output .= '</table>';
        }
        echo $output;
    }
}
?>