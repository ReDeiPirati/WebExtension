# WebExtension DataSet for Text Classification
This little add-ons written as webExtensions is a simple Tool that allows to gather and label urls as future dataSet for Machine Learning.
The package also contains a php serverside script that allows to write into a file in the filesystem: this is a work-around beacuse at the time of writing, webExts cannot have Permission on the FileSystem.
### How it works
The add-ons's icon is: ![crown](icons/crown.png). 
When you want to add the current url in the dataSet, you have to click on the button Y for labeling as 1(positive) or N for negative(0).
Every time you click on a button, the add-ons send a POST to the server with a string:"URL | [1|0]", then the server appends the line in the dataSet file.

This very easy add-ons could scale very well for multi-class dataSet and with a bit of effort could be improve to manipulate and show the dataSet's file in a user-friendly manner.