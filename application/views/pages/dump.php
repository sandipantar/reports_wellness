<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    $manager =$this->session->userdata('user_email');
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
    echo '<pre>';
     $ff= $_FILES['file_name']['name'];
     if(is_array($ff)){
                    for($i=0;$i<count($ff);$i++){
                                $fe=$this->User_model->search_filename_exists($ff);
                                if($fe != NULL) { foreach($fe as $nsf) {
                                  echo $nsf['file_name'];
                                  echo '<script>alert("'.$nsf['file_name'].'-> File EXISTS")</script>';
                                }}
                        }}
                
    echo '</pre>';
    	
                // $referer = $_SERVER['HTTP_REFERER'];
                // header("Location: $referer");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left font-weight-bold mb-2 bg-coffee text-white px-3 py-2 rounded" style="box-shadow: 2px 2px 10px #666">Report Sync Area</h1>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

	<div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder py-3 bg-dark shadow">
                <!--user/add_file-->
              <form  method="post" action="user/add_file"  enctype="multipart/form-data">
                <b>
                    <div class="row">
                        <div class="btcd-f-input">
                            <div class="btcd-f-wrp">
                                <button class="btcd-inpBtn" type="button"> <img src="" alt=""></button>
                                <span class="btcd-f-title text-white" style="text-shadow:2px 2px 10px #000">No File Chosen</span>
                                        <label class="form-label" id="uploadFile"></label>
                                        <input type="file" name="file_name[]" id="sync" class="synced" accept=".pdf" required multiple style="width:235px !important; border:4px solid #000; padding:4px; border-radius:10px; cursor:pointer !important"/>
                            </div>
                            <div class="btcd-files">
                            </div>
                        </div>
                        <!--<input type="hidden" name="user_id[]" value="0"/>-->
                        <?php //if($this->session->userdata('type') == 'Admin') { ?>
                        <input type="hidden" name="manager" value="<?php echo $manager ; ?>"/>  
                        <?php //}
                        ?>   
                        </div>
                        <div class="row w-100">
                            <div class="col-md-10">
                                <button name="submit" type="submit" class="btn btn-md rounded p-2 font-weight-bold button w-100 shadow mt-2" style=" background:#d4e8e4;" onchange="submitForm();">Sync <i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </div>
                            <div class="col-md-2">
                                <div class="loader mx-auto">
                                    <div class="check">
                                      <span class="check-one"></span>
                                      <span class="check-two"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b>
              </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
                <div class="card mb-3"> 
                <div class="card-header text-center"><span class="bg-danger px-2 py-1 text-white rounded shadow h6 font-weight-bold">Files not Matched With any User</span>
                <span class="float-right rounded shadow p-1 font-weight-bold">Today`s Sync Reports <i class="fa fa-history" data-toggle="modal" data-target="#exampleModal1" aria-hidden="true"></i></span>
                </div>
                
            <div class="card-body">
                <div class="table-responsive">
                <table id="show_doctors" class="table  table-bordered display">
                    <thead>
                        <tr>
                            <th>Uploaded File</th>
                            <th>Matched User</th>

                        </tr>
                    </thead>	
                    <?php $id=0; $NonSyncFile=$this->User_model->show_file();  ?>					
                    <tbody>
                        <?php if($NonSyncFile != NULL) { foreach($NonSyncFile as $nsf) { ?>
                        <tr>  
                           <td><? echo $nsf['file_name']; ?> <button class="bg-danger rounded text-white" onclick="del_dump(<?php echo $nsf['envelope_id']; ?>);"><i class="fa fa-trash"></i></button></td>
                           <td>
                                    <div class="d-inline float-left pr-1">
                                        <?php $users=$this->User_model->show_user();
                                            if($users != NULL) { foreach($users as $usr) {
                                            $fileName = $nsf['file_name'];
                                            $userEmail   = $usr['user_email'];
                                            if (strpos($fileName, $userEmail) !== false) {
                                            echo $usr['user_email'];?>
                                    </div>
                                    <div class="d-inline">
                                    <form  method="post" action="user/file_assign"  enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<? echo $usr['user_id']?>"/>
                                        <input type="hidden" name="user_email" value="<? echo $usr['user_email']?>"/>
                                        <input type="hidden" name="file_name" value="<? echo $nsf['file_name']; ?>"/>
                                        <button type="submit" class="btn btn-success btn-sm "><i class="fa fa-user-plus"></i></button>
                                    </form>
                                </div>
                                    <?}}}?>
                           </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                
                <!--modal todaysHistory-->
                              <div class="modal bd-example-modal-xl fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Today`s Sync <? echo date('l\, F jS\, Y ');?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <?php $todaysSyncHistory=$this->User_model->todaySyncHistrory(); ?>
                                      <div class="row">
                                          <table class="table table-bordered display">
                                              <tr><th>Assigned File</th><th>Time</th><th>By</th><th>Matched User</th></tr>
                                      <?php if($todaysSyncHistory != NULL){ foreach($todaysSyncHistory as $tsh) { ?> 
                                            <tr>
                                                <td><?php echo $tsh['file_name']; ?>
                                                    <? if($tsh['UrgentReports']==1){ ?>
                                                                <span class="badge badge-danger ml-1">Urgent</span>
                                                            <?}else{}?>
                                                </td>
                                                <td><?php echo $tsh['time']; ?></td>
                                                <td><?php echo $tsh['manager']; ?></td>
                                                <td>
                                                    <?php $users=$this->User_model->show_user($tsh['user_id']);?>
                                                    <? if($users['user_id']==''){ ?>
                                                                <span class="badge badge-danger ml-1 font-weight-600 py-2">No Matched User</span>
                                                            <?}else{?>
                                                    <a href="<?php echo base_url(); ?>userDetails/<?php echo $users['user_id'];?>" class="btn btn-sm btn-primary">
                                                            <?php echo $users['user_email'] ?>
                                                            <i class="fa fa-eye"></i>
                                                            </a>    <?}?>    
                                                </td>
                                            </tr>
                                          <?php }}?>
                                          </table>
                                       </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal todaysHistory-->
                </div>
               
            </div> 
    </div>
    </div>
</div>
</div>
<script>
    // var delay_popup=5000; setTimeout("document.getElementById('exampleModal1').style.display='block'", delay_popup)
//     setTimeout(function(){
// $('#exampleModal1').modal('show');
// }, 6000);
document.addEventListener('DOMContentLoaded', function () {
  var btn = document.querySelector('.button'),
      loader = document.querySelector('.loader'),
      check = document.querySelector('.check');
  
  btn.addEventListener('click', function () {
    loader.classList.add('active');    
  });
 
  loader.addEventListener('animationend', function() {
    check.classList.add('active'); 
  });
});
// multi show
const fInputs = document.querySelectorAll('.btcd-f-input>div>input')

function getFileSize(size) {
    let _size = size
    let unt = ['Bytes', 'KB', 'MB', 'GB'],
        i = 0; while (_size > 900) { _size /= 1024; i++; }
    return (Math.round(_size * 100) / 100) + ' ' + unt[i];
}

function delItem(el) {
    fileList = { files: [] }
    let fInp = el.parentNode.parentNode.parentNode.querySelector('input[type="file"]')
    for (let i = 0; i < fInp.files.length; i++) {
        fileList.files.push(fInp.files[i])
    }
    fileList.files.splice(el.getAttribute('data-index'), 1)

    fInp.files = createFileList(...fileList.files)
    if (fInp.files.length > 0) {
        el.parentNode.parentNode.parentNode.querySelector('.btcd-f-title').innerHTML = `${fInp.files.length} File Selected`
    } else {
        el.parentNode.parentNode.parentNode.querySelector('.btcd-f-title').innerHTML = 'No File Chosen'
    }
    el.parentNode.remove()
}

function fade(element) {
    let op = 1;  // initial opacity
    let timer = setInterval(function () {
        if (op <= 0.1) {
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
}

function unfade(element) {
    let op = 0.01;  // initial opacity
    element.style.opacity = op;
    element.style.display = 'flex';
    let timer = setInterval(function () {
        if (op >= 1) {
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 13);
}

function get_browser() {
    let ua = navigator.userAgent, tem, M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        return { name: 'IE', version: (tem[1] || '') };
    }
    if (M[1] === 'Chrome') {
        tem = ua.match(/\bOPR|Edge\/(\d+)/)
        if (tem != null) { return { name: 'Opera', version: tem[1] }; }
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) { M.splice(1, 1, tem[1]); }
    return {
        name: M[0],
        version: M[1]
    };
}

for (let inp of fInputs) {
    inp.parentNode.querySelector('.btcd-inpBtn>img').src = 'data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDY0IDY0IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGlkPSJDbGlwIj48cGF0aCBkPSJtMTIuMDggNTcuNzQ5YTkgOSAwIDAgMCAxMi43MjggMGwzMS4xMTItMzEuMTEzYTEzIDEzIDAgMSAwIC0xOC4zODQtMTguMzg1bC0yMC41MDcgMjAuNTA2IDEuNDE1IDEuNDE1IDIwLjUwNi0yMC41MDZhMTEgMTEgMCAxIDEgMTUuNTU2IDE1LjU1NmwtMzEuMTEyIDMxLjExMmE3IDcgMCAwIDEgLTkuOS05LjlsMjYuODctMjYuODdhMyAzIDAgMCAxIDQuMjQyIDQuMjQzbC0xNi4yNjMgMTYuMjY0IDEuNDE0IDEuNDE0IDE2LjI2NC0xNi4yNjNhNSA1IDAgMCAwIC03LjA3MS03LjA3MWwtMjYuODcgMjYuODdhOSA5IDAgMCAwIDAgMTIuNzI4eiIvPjwvZz48L3N2Zz4='
    inp.addEventListener('mousedown', function (e) { setPrevData(e) })
    inp.addEventListener('change', function (e) { handleFile(e) })
}

let fileList = { files: [] }
let fName = null
let mxSiz = null

function setPrevData(e) {
    if (e.target.hasAttribute('multiple') && fName !== e.target.name) {
        console.log('multiple')
        fName = e.target.name
        fileList = fileList = { files: [] }
        if (e.target.files.length > 0) {
            for (let i = 0; i < e.target.files.length; i += 1) {
                console.log(e.target.files[i])
                fileList.files.push(e.target.files[i])
            }
        }
    }
}

function handleFile(e) {
    let err = []
    const fLen = e.target.files.length;
    mxSiz = e.target.parentNode.querySelector('.f-max')
    mxSiz = mxSiz != null && (Number(mxSiz.innerHTML.replace(/\D/g, '')) * Math.pow(1024, 2))

    if (e.target.hasAttribute('multiple')) {
        for (let i = 0; i < fLen; i += 1) {
            fileList.files.push(e.target.files[i])
        }
    } else {
        fileList.files.push(e.target.files[0])
    }

    //type validate
    if (e.target.hasAttribute('accept')) {
        let tmpf = []
        let type = new RegExp(e.target.getAttribute('accept').split(",").join("$|") + '$', 'gi')
        for (let i = 0; i < fileList.files.length; i += 1) {
            if (fileList.files[i].name.match(type)) {
                tmpf.push(fileList.files[i])
            } else {
                err.push('Wrong File Type Selected')
            }
        }
        fileList.files = tmpf
    }

    // size validate
    if (mxSiz > 0) {
        let tmpf = []
        for (let i = 0; i < fileList.files.length; i += 1) {
            if (fileList.files[i].size < mxSiz) {
                tmpf.push(fileList.files[i])
                mxSiz -= fileList.files[i].size
            } else {
                console.log('rejected', i, fileList.files[i].size)
                err.push('Max Upload Size Exceeded')
            }
        }
        fileList.files = tmpf
    }

    if (e.target.hasAttribute('multiple')) {
        e.target.files = createFileList(...fileList.files)
    } else {
        e.target.files = createFileList(fileList.files[fileList.files.length - 1])
        fileList = { files: [] }
    }

    // set File list view
    if (e.target.files.length > 0) {
        e.target.parentNode.querySelector('.btcd-f-title').innerHTML = e.target.files.length + ' File Selected'
        e.target.parentNode.parentNode.querySelector('.btcd-files').innerHTML = ''
        for (let i = 0; i < e.target.files.length; i += 1) {
            let img = null
            if (e.target.files[i].type.match(/image-*/)) {
                img = window.URL.createObjectURL(e.target.files[i])
            }
            else {
                img = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMi4wLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzNTIgNDI5LjEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDM1MiA0MjkuMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6IzAwNEJCNzt9DQo8L3N0eWxlPg0KPHBhdGggZD0iTTQwOC44LDY2Ljh2MzI3LjRjMCwyNy40LDIyLjgsNDkuOCw1MC4zLDQ5LjhoMjM5LjNjMjcuNSwwLDQ5LjgtMjIuMyw0OS44LTQ5LjhWMTE2Yy0wLjEtMi42LTEuMi01LjItMy4xLTdsLTg4LjktODkuMQ0KCWMtMS45LTEuOS00LjQtMi45LTcuMS0yLjloLTE5MEM0MzEuNiwxNyw0MDguOCwzOS40LDQwOC44LDY2Ljh6IE03MTMuOCwxMDUuOUg2ODNjLTYuMywwLTEyLjQtMi41LTE2LjgtNi45DQoJYy00LjUtNC41LTctMTAuNS02LjktMTYuOHYtMzFMNzEzLjgsMTA1Ljl6IE00MjguOCw2Ni44YzAtMTYuNSwxMy45LTI5LjgsMzAuMy0yOS44aDE4MC4ydjQ1LjFjMCwxMS42LDQuNiwyMi43LDEyLjgsMzENCgljOC4yLDguMiwxOS4zLDEyLjgsMzAuOSwxMi44aDQ1LjF2MjY4LjVjMCwxNi41LTEzLjksMjkuOC0zMC4zLDI5LjhINDU5LjFjLTE2LjYsMC0zMC4zLTEzLjQtMzAuMy0yOS44VjY2Ljh6Ii8+DQo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMjc3LjIsMTY2LjlIMTMwLjZjLTUuMSwwLTkuMiw0LjEtOS4yLDkuMnM0LjEsOS4yLDkuMiw5LjJoMTQ2LjVjNS4xLDAsOS4yLTQuMSw5LjItOS4xDQoJQzI4Ni40LDE3MSwyODIuMywxNjYuOSwyNzcuMiwxNjYuOXoiLz4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik05My41LDE2Ni45SDY2LjRjLTUuMSwwLTkuMiw0LjEtOS4yLDkuMnM0LjEsOS4yLDkuMiw5LjJoMjcuMWM1LjEsMCw5LjItNC4xLDkuMi05LjJTOTguNiwxNjYuOSw5My41LDE2Ni45eiINCgkvPg0KPHBhdGggY2xhc3M9InN0MCIgZD0iTTI3Ny4yLDI0MC4zSDEzMC42Yy01LjEsMC05LjIsNC4xLTkuMiw5LjJjMCw1LjEsNC4xLDkuMiw5LjIsOS4yaDE0Ni41YzUuMSwwLDkuMi00LjEsOS4yLTkuMQ0KCVMyODIuMywyNDAuNCwyNzcuMiwyNDAuM3oiLz4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik05My41LDI0MC4zSDY2LjRjLTUuMSwwLTkuMiw0LjEtOS4yLDkuMmMwLDUuMSw0LjEsOS4yLDkuMiw5LjJoMjcuMWM1LjEsMCw5LjItNC4xLDkuMi05LjINCglDMTAyLjcsMjQ0LjQsOTguNiwyNDAuMyw5My41LDI0MC4zeiIvPg0KPHBhdGggY2xhc3M9InN0MCIgZD0iTTI3Ny4yLDMxMy44SDEzMC42Yy01LjEsMC05LjIsNC4xLTkuMiw5LjJjMCw1LjEsNC4xLDkuMiw5LjIsOS4yaDE0Ni41YzUuMSwwLDkuMi00LjEsOS4yLTkuMQ0KCUMyODYuNCwzMTgsMjgyLjMsMzEzLjgsMjc3LjIsMzEzLjh6Ii8+DQo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNOTMuNSwzMTMuOEg2Ni40Yy01LjEsMC05LjIsNC4xLTkuMiw5LjJjMCw1LjEsNC4xLDkuMiw5LjIsOS4yaDI3LjFjNS4xLDAsOS4yLTQuMSw5LjItOS4yDQoJQzEwMi43LDMxNy45LDk4LjYsMzEzLjgsOTMuNSwzMTMuOHoiLz4NCjxnPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0yNjMsNDEyLjFIODljLTQxLjQsMC03NS0zMy42LTc1LTc1di0yNDVjMC00MS40LDMzLjYtNzUsNzUtNzVoMTQ3LjVjOCwwLDE1LjcsMywyMS42LDguNWw2OSw2My42DQoJCWM2LjksNi4zLDEwLjgsMTUuMywxMC44LDI0Ljd2MjIzLjJDMzM4LDM3OC40LDMwNC40LDQxMi4xLDI2Myw0MTIuMXogTTg5LDM3LjNjLTMwLjIsMC01NC43LDI0LjYtNTQuNyw1NC43djI0NQ0KCQljMCwzMC4yLDI0LjYsNTQuNyw1NC43LDU0LjdoMTc0YzMwLjIsMCw1NC43LTI0LjYsNTQuNy01NC43VjExMy44YzAtMy43LTEuNi03LjMtNC4zLTkuOGwtNjktNjMuNmMtMi4yLTItNS0zLjEtNy45LTMuMUg4OXoiLz4NCjwvZz4NCjwvc3ZnPg0K'
            }
            e.target.parentNode.parentNode.querySelector('.btcd-files').insertAdjacentHTML('beforeend', `<div style="padding:25px !important; margin-bottom:15px !important; box-shadow: 2px 2px 10px #000 !important">
                    <img src="${img}" alt="img"  title="${e.target.files[i].name}">
                    <div>
                        <span title="${e.target.files[i].name}">${e.target.files[i].name}</span>
                        <br/>
                        <small>${getFileSize(e.target.files[i].size)}</small>
                    </div>
                    <button type="button" onclick="delItem(this)" data-index="${i}" style="float:right !important; margin-left:359px !important; border:2px #red; padding:0px 5px 33px 5px !important;" title="Remove This File"><span>&times;</span></button>
                </div>`)

        }
    }

    // set eror
    if (err.length > 0) {
        for (let i = 0; i < err.length; i += 1) {
            e.target.parentNode.parentNode.querySelector('.btcd-files').insertAdjacentHTML('afterbegin', `
            <div style="background: #fff2f2;color: darkred;display:none; box-shadow:2px 2px 10px #000 !important" class="btcd-f-err">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjg2LjA1NCIgaGVpZ2h0PSIyODYuMDU0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoKIDxnPgogIDx0aXRsZT5iYWNrZ3JvdW5kPC90aXRsZT4KICA8cmVjdCBmaWxsPSJub25lIiBpZD0iY2FudmFzX2JhY2tncm91bmQiIGhlaWdodD0iNDAyIiB3aWR0aD0iNTgyIiB5PSItMSIgeD0iLTEiLz4KIDwvZz4KIDxnPgogIDx0aXRsZT5MYXllciAxPC90aXRsZT4KICA8ZyBzdHJva2U9Im51bGwiIGlkPSJzdmdfMSI+CiAgIDxwYXRoIHN0cm9rZT0ibnVsbCIgaWQ9InN2Z18yIiBmaWxsPSIjOTEwNjAxIiBkPSJtMTQzLjAyNjk5Nyw1Ni4wMDAwMDVjLTQ4LjA2MDg2NSwwIC04Ny4wMjY5OTcsMzguOTY2MTMxIC04Ny4wMjY5OTcsODcuMDI2OTk3YzAsNDguMDY2MzQyIDM4Ljk2NjEzMSw4Ny4wMjY5OTcgODcuMDI2OTk3LDg3LjAyNjk5N2M0OC4wNjYzNDIsMCA4Ny4wMjY5OTcsLTM4Ljk1NTE3OSA4Ny4wMjY5OTcsLTg3LjAyNjk5N2MwLC00OC4wNjA4NjUgLTM4Ljk2MTI2NCwtODcuMDI2OTk3IC04Ny4wMjY5OTcsLTg3LjAyNjk5N3ptMCwxNTcuNzM2MTY2Yy0zOS4wNTMxNDIsMCAtNzAuNzA5MTY5LC0zMS42NTYwMjcgLTcwLjcwOTE2OSwtNzAuNzA5MTY5czMxLjY1NjAyNywtNzAuNzA5MTY5IDcwLjcwOTE2OSwtNzAuNzA5MTY5czcwLjcwOTE2OSwzMS42NTYwMjcgNzAuNzA5MTY5LDcwLjcwOTE2OXMtMzEuNjU2MDI3LDcwLjcwOTE2OSAtNzAuNzA5MTY5LDcwLjcwOTE2OXptMC4wMDU0NzYsLTExOS41Njk1NThjLTYuMjMzMTIxLDAgLTEwLjk0OTMzNywzLjI1Mjg1NyAtMTAuOTQ5MzM3LDguNTA2OTU2bDAsNDguMTkxMDc3YzAsNS4yNTk1NzYgNC43MTU2MDgsOC41MDE0OCAxMC45NDkzMzcsOC41MDE0OGM2LjA4MTAwNCwwIDEwLjk0OTMzNywtMy4zNzc1OTIgMTAuOTQ5MzM3LC04LjUwMTQ4bDAsLTQ4LjE5MTA3N2MtMC4wMDA2MDgsLTUuMTI5MzY0IC00Ljg2ODMzMywtOC41MDY5NTYgLTEwLjk0OTMzNywtOC41MDY5NTZ6bTAsNzYuMDU2MzY0Yy01Ljk4ODUxOCwwIC0xMC44NjIzMjYsNC44NzM4MDkgLTEwLjg2MjMyNiwxMC44NjcxOTRjMCw1Ljk4MzA0MSA0Ljg3MzgwOSwxMC44NTY4NSAxMC44NjIzMjYsMTAuODU2ODVzMTAuODU2ODUsLTQuODczODA5IDEwLjg1Njg1LC0xMC44NTY4NWMtMC4wMDA2MDgsLTUuOTkzOTk0IC00Ljg2ODMzMywtMTAuODY3MTk0IC0xMC44NTY4NSwtMTAuODY3MTk0eiIvPgogIDwvZz4KICA8ZyBpZD0ic3ZnXzMiLz4KICA8ZyBpZD0ic3ZnXzQiLz4KICA8ZyBpZD0ic3ZnXzUiLz4KICA8ZyBpZD0ic3ZnXzYiLz4KICA8ZyBpZD0ic3ZnXzciLz4KICA8ZyBpZD0ic3ZnXzgiLz4KICA8ZyBpZD0ic3ZnXzkiLz4KICA8ZyBpZD0ic3ZnXzEwIi8+CiAgPGcgaWQ9InN2Z18xMSIvPgogIDxnIGlkPSJzdmdfMTIiLz4KICA8ZyBpZD0ic3ZnXzEzIi8+CiAgPGcgaWQ9InN2Z18xNCIvPgogIDxnIGlkPSJzdmdfMTUiLz4KICA8ZyBpZD0ic3ZnXzE2Ii8+CiAgPGcgaWQ9InN2Z18xNyIvPgogPC9nPgo8L3N2Zz4=" alt="img">
                <span>${err[i]}</span>
            </div>`)
        }
        const errNods = e.target.parentNode.parentNode.querySelectorAll('.btcd-files>.btcd-f-err')
        for (let i = 0; i < errNods.length; i += 1) {
            unfade(errNods[i])
            setTimeout(() => { fade(errNods[i]) }, 3000);
            setTimeout(() => { errNods[i].remove() }, 4000);
        }
        err = []
    }

}




</script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="https://unpkg.com/create-file-list@1.0.1/dist/create-file-list.min.js"></script>
<?php }} ?>

