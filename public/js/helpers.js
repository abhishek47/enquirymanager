var days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
var goBackDays = 7;

function getLastDays(goBackDays) {
    var today = new Date();
    var daysSorted = [];


    for(var i = 0; i < goBackDays; i++)
    {
        var newDate = new Date(today.setDate(today.getDate() - 1));
        daysSorted.push(formatDate(newDate));
    }

   return daysSorted.reverse();

}


function formatDate(date) {
  

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();


  day = ("0" + day).slice(-2);
  month = ("0" + (monthIndex + 1)).slice(-2);

  

  return year + '-' + month + '-' + day ;
}