document.addEventListener("DOMContentLoaded", function() {
  // SIDENAVIGATION
  let sideNavs = document.querySelectorAll(".sidenav");
  let sideNavInstances = M.Sidenav.init(sideNavs, {
    onCloseStart: function() {
      closeTrigger.classList.remove("shown");
      openTrigger.classList.add("shown");
      if (sideNavInstances[0].isOpen) {
        sideNavInstances[0].close();
        e.preventDefault();
      }
    }
  });

  // SIDENAV TRIGGERS
  let closeTrigger = document.querySelector(".sidenav-trigger-close");
  let openTrigger = document.querySelector(".sidenav-trigger");

  //CLOSE
  closeTrigger.addEventListener("click", function(e) {
    closeTrigger.classList.remove("shown");
    openTrigger.classList.add("shown");
    if (sideNavInstances[0].isOpen) {
      sideNavInstances[0].close();
      e.preventDefault();
    }
  });
  //OPEN
  openTrigger.addEventListener("click", function(e) {
    openTrigger.classList.remove("shown");
    closeTrigger.classList.add("shown");
    e.preventDefault();
  });
  let modals = document.querySelectorAll(".modal");
  let modalInstances = M.Modal.init(modals);
  /*---------------
  SEARCHABLE STOREFINDER  
  ---------------*/

  //Get Input
  if (document.querySelector("#storefinder-input")) {
    const storefinderForm = document.querySelector("#storefinder-input");
    storefinderForm.addEventListener("keyup", e => {
      findStore(e.target.value);
    });
    function findStore(value) {
      const storefinderRows = document.querySelectorAll("#storefinderTable tr");
      for (let row of storefinderRows) {
        const storefinderTD = row.querySelectorAll("td");
        for (let cell of storefinderTD) {
          if (cell.textContent.toLocaleLowerCase().indexOf(value.toLowerCase()) !== -1) {
            row.style.display = "";
            break;
          } else {
            row.style.display = "none";
          }
        }
      }
    }
  }
});
