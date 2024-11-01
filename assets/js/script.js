// Function to open a modal
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
}

// Function to close a modal
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none";
}

// Add Program Modal
var addBtn = document.getElementById("addBtn");
var addModal = document.getElementById("addProgram");
var addCloseSpan = document.getElementById("addCloseBtn");

addBtn.onclick = function() {
    openModal("addProgram");
}

addCloseSpan.onclick = function() {
    closeModal("addProgram");
}

window.onclick = function(event) {
    if (event.target == addModal) {
        closeModal("addProgram");
    }
}

// Edit Program Modal
var editBtn = document.getElementById("editBtn");
var editModal = document.getElementById("editProgram");
var editCloseSpan = document.getElementById("editCloseBtn");

editBtn.onclick = function() {
    openModal("editProgram");
}

editCloseSpan.onclick = function() {
    closeModal("editProgram");
}

window.onclick = function(event) {
    if (event.target == editModal) {
        closeModal("editProgram");
    }
}

// Delete Program Modal
var delBtn = document.getElementById("delBtn");
var delModal = document.getElementById("delProgram");
var delCloseSpan = document.getElementById("delCloseBtn");

delBtn.onclick = function() {
    openModal("delProgram");
}

delCloseSpan.onclick = function() {
    closeModal("delProgram");
}

window.onclick = function(event) {
    if (event.target == delModal) {
        closeModal("delProgram");
    }
}

//profile popup

var profileModal = document.getElementById("myProfile");

var profileBtn = document.querySelector(".mprofile");

var closeProfileSpan = document.getElementById("myProfileCloseBtn");

profileBtn.onclick = function(event) {
    event.preventDefault(); 

    profileModal.style.display = "block";
}

closeProfileSpan.onclick = function() {
    profileModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == profileModal) {
        profileModal.style.display = "none";
    }
}

//approve and reject members
function approveMember() {
    var memberId = prompt("Enter the Member ID to approve:");
    if (memberId) {
        window.location.href = "process.php?action=approve&id=" + memberId;
    }
}

function rejectMember() {
    var memberId = prompt("Enter the Member ID to reject:");
    if (memberId) {
        window.location.href = "process.php?action=reject&id=" + memberId;
    }
}

//search
document.getElementById('search').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault(); 
      document.getElementById('searchForm').submit(); 
    }
  });