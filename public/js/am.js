function passwordCheck(){
    var url = '{{url('/')}}';
    var crypt ="{{\Crypt::encrypt('19980324')}}";

    var password = prompt("Please enter the password.");
    if (password==="19980324"){
        console.log('berhasil');
        // document.getElementById('am').style.display = 'block';
        document.getElementById('am').click();
        // document.getElementById('am').style.display = 'none';


    } else{
        // while(password !=="19980324"){
        //     password = prompt("Please enter the password.");
        // }
        // window.location=url+"/am?token="+crypt;
    }
}
