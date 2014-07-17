# Project 3
## CS S-15

By David Becerra

##Live URL
http://p3-becerra.rhcloud.com
##Description
This website is meant to be a toolkit for developers. It includes a Lorem Ipsum text generator and a Random User generator. The lorem ipsum generator creates 1 to 99 paragraphs of random lorem ipsum text. The Random User generator creates random user data including name, address, and a small bio/description.

##Details for instructor
So the actual design of the site is fairly minimal. This last week I was fairly busy with various proctor responsibilities that I didn't have as much time as I wanted to work on this site. My approach was to focus more on getting the features implemented and becoming comfortable with Laravel and Composer at the expense of working on the CSS. With that being said, I have implemented both the Lorem Ipsum Generator and Random User generator for this assignment. For both, I integrated the packages recommended on the project description. I allow the user to input the number of paragraphs of lorem ipsum text and number of users desired. I also have two additional options for the user (include address and/or a bio).

I handle user input using forms. The logic for the lorem ipsum input is handled in routes.php. For the user data, I created a class in app/lib/UserProcessor.php that encapsulates the logic needed. I then call upon the relevant methods in route.php.

One question I do have is regarding bootstrap. More specifically, do you know of any good resources for learning how to utilize bootstrap? I've never used it, and it seems like a great framework for styling a web application.

##Outside code
* Form validation check for lorem ipsum page copied from my p2 assignment.
* Lorem Ipsum package documentation: https://github.com/samuelwilliams/LoremIpsum
* Random User Generator package documentation: https://github.com/fzaninotto/Faker