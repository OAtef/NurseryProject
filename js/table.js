$(".row").on("click", function(){
	extraRowClass = ".extra-data-"+$(this).prop("class").split(" ")[1];
	$(extraRowClass).slideToggle(500);
});
// to change the labels in the tables

function setVisible() { 

        document.getElementById("EditorDiv").style.visibility='visible' ;
        // document.getElementById("EditorDivِEmail").style.visibility='visible' ;
        // document.getElementById("EditorDivBdate").style.visibility='visible' ;
}
function changeName() {

	
        let lbl = document.getElementById('lblName');
        let empName = document.getElementById('emp').value;

        lbl.innerText = empName;       // TREATS EVERY CONTENT AS TEXT.
    }
function changeMobile() {

	  
        let lbl = document.getElementById('lblMobile');
        let empName = document.getElementById('emp').value;

        lbl.innerText = empName;       // TREATS EVERY CONTENT AS TEXT.
    }


function changeEmail() {

	  
        let lbl = document.getElementById('lblEmail');
        let empName = document.getElementById('emp').value;

        lbl.innerText = empName;       // TREATS EVERY CONTENT AS TEXT.
    }
