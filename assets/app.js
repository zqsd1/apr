/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

// const $ = require('jquery');
// // this "modifies" the jquery module: adding behavior to it
// // the bootstrap module doesn't export/return anything
// require('bootstrap');

// // or you can include specific pieces
// // require('bootstrap/js/dist/tooltip');
// // require('bootstrap/js/dist/popover');

// $(document).ready(function() {
//     $('[data-toggle="popover"]').popover();
// });



document.querySelectorAll(".table-sort-js").forEach((table) =>
  table.addEventListener("click", (event) => {
    if (event.target.tagName == "TH") {
      sortTable(event.target.cellIndex, event.target.offsetParent);
    }
  })
);

document.querySelector(".search-input-js").addEventListener("input", (event) => {
  let search = event.target.value;

  document.querySelectorAll("tbody tr").forEach((element) => {
    //comprend pas pk mais some() marche pas direct
    let array = Array.from(element.querySelectorAll("td"));
    let test = array.some((e) => e.innerHTML.includes(search));
    test
      ? (element.style.visibility = "visible")
      : (element.style.visibility = "collapse");
  });
});

function sortTable(n, table) {
  var table,
    rows,
    switching,
    i,
    x,
    y,
    shouldSwitch,
    dir,
    switchcount = 0;
  //table = document.getElementById("client_table");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
    no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
      first, which contains table headers): */
    for (i = 1; i < rows.length - 1; i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
        one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount++;
    } else {
      /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
