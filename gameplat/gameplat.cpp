#include <iostream>
#include <fstream>
#include <string>
#include <algorithm>
#include <stdio.h>
#include <vector> 
#include <cstring>  
using namespace std;

bool checkUser(){
//check if username and password is correct
bool check=0;
string username; 
string password; 
while (check==0){
//telling user to enter user
cout << "Please enter your username "; 
//setting the entered username to the string username
cin >> username; 
//telling user to enter password
cout << "Please enter your password "; 
//setting entered password to the string password
cin >> password; 
//is statement: if username and password are correct, output the statement in int main
  if(username =="admin" && password == "admin"){
    check = true; 
//using else statement to say that if username and password are incorrect, this statement will be displayed. 
}else{
    check = false; 
        cout << "We are sorry, both username and password are incorrect" << endl; 
    cout << "Try again"<< endl; 
}
}
//returning the function 
return check; 
}

void invite_guest(){
  cout << "Hello, please type in the guest you would like to invite. "; 
    //accept parameters of guestName, phone number etc..
  string guestName; 
  string phone;
  cin >> guestName; 
  cout << "Please enter the guest's phone number "; 
  cin >> phone;
  cout << "Please choose from one of our preset messages "; 
  string res;
  cout << endl; 
  //create vector string of messages from presetmessages txt file 
  
  vector<std::string> messages = {}; 
  ifstream file("presetmess.txt");//Retrieving response from data.txt
  while (getline (file, res)) {
    //loop to add to vector 
    messages.push_back (res);
    cout << res << endl;
  }
  file.close(); 
  int presetmessage; 
  cin >> presetmessage;
  
  cout << "Sending message now " << endl; 
  string test = messages[presetmessage-1]; 
  string message = "Hello "+guestName + " " + test;
  //based on input of preset message, add custom message 
  
  string url = "curl -X POST 'https://api.twilio.com/2010-04-01/Accounts/AC7840a441ed9f6a66a27a6f3d32a6abcd/Messages.json' \
--data-urlencode 'Body="+message +"' \
--data-urlencode 'From=+13614056153' \
--data-urlencode 'To=" + phone +"' \
-u AC7840a441ed9f6a66a27a6f3d32a6abcd:f60c80f4a63f13a382a2f3c2bf04ad15"; 
    url  = "curl " + url;
  system(url.c_str());
    system("clear");//Clearing previous logs so that the result can be seen neatly

  //use curl to send text message using twilio API 

}

void add_guest(){
  struct{
    string Guestfirstname; 
    string Guestlastname; 
    string status; 
  }guest; 
  //have a structure to store guest data 

  cout << "Please enter the guest you would like to add"<<endl; 
  cout << "Enter the guest's first name "; 
  cin >> guest.Guestfirstname; 
  cout << "Enter the guest's last name "; 
  cin >> guest.Guestlastname; 
  cout << "Enter which status \n 1. RSVPed \n 2. Not RSVPed "; 
  cin>> guest.status; 
  string fullname = guest.Guestfirstname + guest.Guestlastname; 
  string url = "curl -X PUT -d '"+guest.status+"' https://test-34a92-default-rtdb.firebaseio.com/"+fullname+".json"; 
    url  = "curl " + url;
  system(url.c_str());
    system("clear");//Clearing previous logs so that the result can be seen neatly

}

void view_list(){
  string url = "https://test-34a92-default-rtdb.firebaseio.com/.json";
    url  = "curl -o data.txt " + url;//Adding the CURL command to the URL (I save the result in a file called data.txt)
  system(url.c_str());//Executing script
  system("clear");//Clearing previous logs so that the result can be seen neatly
  string res;
  ifstream file("data.txt");//Retrieving response from data.txt
  while (getline (file, res)) {
    cout << res << endl; 
  }
  file.close(); 
  remove("data.txt");//Deleting file after the output is shown 
  
  
}
  
  void liststuff(int n) {
    //recursion - use of recursion that allows you to iterate
    vector<std::string> fourthings = {"Relax", "Be excited", "Spend time with you S.O."}; 
    if (n == 0) {
    } else {
      int i=n-1;
        cout <<fourthings[i]<<endl; 
      liststuff(n-1); 
    }
}


int main() {
    cout << "----------------------WELCOME TO LOGIN PAGE------------------------ " << endl; 
    cout << "-------------MILLIE'S WEDDING PLANNER-------- " << endl; 
  // Check the user's login credentials
   bool check = checkUser(); 
   if(check == true){
    cout << "Thank you. Username and Password are correct" << endl;     

    int action; 
     while (action !=5){
     cout << "Please Enter What You Would Like To Do: \n  1. Invite a guest with a text reminder. \n 2. Add a Guest to Guest list \n 3. 4 Reminders for you \n 4. View Guest List \n 5. EXIT\n  ";
     cin >> action; 
     if(action ==1){
        invite_guest(); 
     }else if(action ==2){
       add_guest(); 
       //addguest 
     }else if(action ==3){
       liststuff(3); 
       //view checklist
     }else if(action ==4){
       view_list();
       //exiting program
     }else if(action ==5){
       
     }
  }
     
   }else{
    cout << "ERROR"; 
   }


  return 0; 
}
