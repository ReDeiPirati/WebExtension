/*
Given the name of a beast, get the URL to the corresponding image.
*/
function appendInDataset(choice){
  if (choice == "Y") {
      /* append URL | [1|0] */
    chrome.tabs.query({currentWindow: true, active: true}, function(tabs){
      var data = tabs[0].url + " | " + "1"

      // DB
      // console.log(data);

      // Send data to my localhost script to write into file
      $.ajax({ 
        type: "POST",
        url: "http://localhost/index.php",
        data: { "s": data}
          });
       }
    );
  }
  else{
      /* append URL | [1|0] */
    chrome.tabs.query({currentWindow: true, active: true}, function(tabs){
      var data = tabs[0].url + " | " + "0"
        
      // DB
      // console.log(data);

      // Send data to my localhost script to write into file
      $.ajax({ 
        type: "POST",
        url: "http://localhost/index.php",
        data: { "s": data}
        });    
      }
    );
  }
}

/*
Listen for clicks in the popup.

If the click is on one of the choice:
  Inject the "y_or_n.js" content script in the active tab.

  Then get the active tab and send "y_or_n.js" a message
  containing the choice.

If it's on a button wich contains class "clear":
  Reload the page.
  Close the popup. This is needed, as the content script malfunctions after page reloads.
*/
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("choice")) {
     // Y or N 
    var choice = e.target.textContent;
    // DB
    // console.log(choice);
    var chosenBeastURL = appendInDataset(choice);
  
  }
  else if (e.target.classList.contains("clear")) {
    browser.tabs.reload();
    window.close();
  }
});