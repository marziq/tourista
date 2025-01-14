# Tourista ( All-in-One booking system)

## Group Members

-   **Member 1**: Ammar Haziq bin Zainal (2217763)
-   **Member 2**: Nur Amira Binti Azhari (2217176)
-   **Member 3**: Nik Shameera Azfareeha Binti Nik Shamlan (2213916)
-   **Member 4**: Amirah Amnani binti Mohd Hushini @ Mohd Husaini (2215714)
-   **Member 5**: Nur Nisa Nasuha Binti Nazri (2216458)

## Introduction

Tourista is a comprehensive web-based tour management system designed to streamline the process of planning and booking tours for customers. Developed using the Laravel framework, the system leverages modern web technologies to provide an intuitive and user-friendly interface. Tourista caters to individuals and families seeking seamless travel arrangements, combining essential features like flight, hotel, rental vehicle, tour packages, and attraction bookings into a unified platform.

The system empowers users to explore curated travel packages, customize their itineraries, and manage all aspects of their travel plans effortlessly. With a secure payment gateway integration, Tourista ensures safe and reliable financial transactions, making it the go-to platform for stress-free travel planning.

## Objectives

The primary goal of Tourista is to simplify travel planning by integrating multiple booking options into a single platform. It is designed to:

-   Save users time and effort by consolidating services.
-   Provide transparency with clear pricing and itinerary details.
-   Offer flexibility through customizable packages.
-   Ensure secure transactions and protect user data.

## Features and Functionalities

1. **User Authentication**:
    - Create: Allow users to register by providing personal information such as username, email, and password.
    - Read: Display the user's profile and other features after the user has successfully logged in.
    - Update: Allow users to update their profile information, such as changing their email address, password, and contact details.
    - Delete: Allow users to delete or deactivate their accounts.
2. **Flight Booking**:
   
   **User**
    - Create: Allow users to book a flight by entering required details such as departure and arrival locations , travel date and passenger count.
    - Read: Display available flights schedules based on user inputs.
      
   **Admin**
    - Create: Allow users to book a flight by entering required details such as departure and arrival locations , travel date and passenger count.
    - Update: Allow users to modify their flight bookings, including changing flight dates and edit passenger count.
    - Delete: Let users cancel their flight.
3. **Hotel Booking**:
      
   **User**
    - Create: Allow users to book hotel rooms by selecting a hotel, room type, check-in and check-out dates, and the number of guests.
    - Read: Display a list of available hotels with detailed descriptions, including room types, pricing, amenities, and availability based on the selected dates.
            
   **Admin**
    - Create: Allow users to book hotel rooms by selecting a hotel, room type, check-in and check-out dates, and the number of guests.
    - Update: Allow users to modify their existing bookings by changing the check-in/out dates, room type, or number of guests, subject to availability.
    - Delete: Allow users to cancel their booking.
4. **Car Rental Booking**:
         
   **User**
    - Create: Allow users to book a car by entering required details like dates, location, and preferences.
    - Read: Display car listings with detailed descriptions, availability, and pricing.
                  
   **Admin**
    - Create: Allow users to book a car by entering required details like dates, location, and preferences.
    - Update: Enable users to modify bookings, such as changing dates or vehicle type.
    - Delete: Delete bookings from the database, ensuring that cancellations are handled according to the company’s cancellation policies.
5. **Tour Package Booking**:
            
   **User**
    - Create: Allow users to book a tour packages by selecting one of the packages available.
    - Read: Display a complete details about packages like the price per pax, duration and etc.
                        
   **Admin**
   - Create: Allow users to book a tour packages by selecting one of the packages available.
    - Update: Allow users to modify the pax for the tour packages.
    - Deleet: Allow users to cancel their booking.
6. **Attraction Booking**:
                
   **User**
    - Create: Enable users to book attractions by selecting desired locations,date and category attractions.
    - Read:Display a comprehensive list of available attractions with descriptions, ratings, operational hours, and ticket pricing.
                        
   **Admin**
    - Create: Enable users to book attractions by selecting desired locations,date and category attractions.
    - Update:Allow users to modify their bookings, such as adjusting the date and or number of participants.
    - Delete: Permit users to cancel attraction bookings only before payment is completed.
7. **Payment Integration**:
    - Create: Allow users to make a payment for their bookings.
    - Read: Display all the details like total price that need to pay, the information of their information, and etc.

## Entity-Relationship Diagram (ERD)

![ERD WAD Project drawio](https://github.com/user-attachments/assets/729fa1f1-9dc7-4d6c-9b37-9d6f1bd590ce)

## Sequence Diagram

![image](https://github.com/user-attachments/assets/d935b65f-4758-471e-8061-c7fc1a3c3a9d)


## Mockup

1. **Home Page**
   ![HOME (1)](https://github.com/user-attachments/assets/3388dada-9428-469f-a769-a289d70901d0)
   ![image](https://github.com/user-attachments/assets/64f6f092-b018-49fe-ad76-5fa39ce46000)

2. **Log in Page**:
   ![image](https://github.com/user-attachments/assets/f3f544d8-965a-4d51-b55c-bbddcd2afa25)

3. **Sign Up Page**:
   ![image](https://github.com/user-attachments/assets/eea2051c-007e-4fe3-91e1-2aa705eeb32f)

4. **Flight Booking Page**:
   ![image](https://github.com/user-attachments/assets/8c4d0744-a31e-4279-aea3-7f1c1188550c)
   ![image](https://github.com/user-attachments/assets/de78a347-34c7-4a8f-bb20-80d8b491c6a9)

5. **Hotel Booking Page**:
   ![Hotel booking page 1](https://github.com/user-attachments/assets/313df16f-4b86-428d-ab92-db0d0ae1083e)
   ![Hotel (1)](https://github.com/user-attachments/assets/277d2411-c6a2-4ad4-9bac-a25d667eefc2)

6. **Vehicle Booking Page**:
   ![Rental](https://github.com/user-attachments/assets/15bd4417-1c7f-427f-af0f-7b99f854f849)

8. **Tour Packages Page**:
   ![Tour Package 1](https://github.com/user-attachments/assets/ca35407f-8df8-47ba-ada7-35c346c55541)
   ![Tour Package 2](https://github.com/user-attachments/assets/8ec8c8a7-db27-4303-817f-27cbda55c944)
7. **Attraction Booking Page**:
   ![12](https://github.com/user-attachments/assets/4763f105-99da-431d-a50d-37e04272f21e)
   ![13](https://github.com/user-attachments/assets/0fe02263-08dc-4ba8-b347-00ded85ecfd5)

8. **Payment Page**:
    ![Checkout(cart)](https://github.com/user-attachments/assets/4d1ed0f0-011d-421a-b3de-b718d6079726)

## Project system captured screen and explanation
1. **Home Page**
2. **About Us**
3. **Teams**
4. **Header**
5. **Footer**
   
## User View
1. **Register** - A screen for new users to create an account

Key Features:
Form for user details (name, email, password).
Validation and success/error messages.

2. **Login** - Allows users to log in to their accounts

Key Features:
Fields for email/username and password.

3. **Hotels** - Displays available hotels and their details

Key Features:
Search filters (destination, check in, check out, pax).
Hotel listings with images and prices.
Booking option.

4. **Rentals** - Display available rental cars and their details

Key Features:
Search filters (pickup location, pickup date, return date).
Rental listings with images, details and prices.
Booking option.

5. **Flight** - Display available flights and their details

Key Features:
Search filter (departure, destination, travel dates, passengers).
Rental listings with images, prices and details
Booking option.

6. **Trips** - Displays pre-planned travel packages

Key Features:
Trip categories (package name, price range).
Trip listing package with images, prices and details.
Booking options.

7. **Attractions** - Display popular attractions in a specific area.

Key Features:
Search filter (destination, date and category).
Attraction listing details with images, pax, price and descriptions.
Booking options.

8. **Payment** - Facilitates the transaction process for bookings

Key Features:
Payment option (credit card)
Summary of the purchase.
Billing details form.
   
## Admin View
1. **Login** - Allows administrators to log in

Key Features:
Administrator has a unique username and password for personalized access.

2. **Hotels** - Admin panel to manage hotel listings

Key Features:
Add, edit, or delete hotels.
View booking 

3. **Rentals** - Admin panel for rental cars

Key Features:
Create, update and delete rentals.
View booking 

4. **Flight** - Admin view for managing flights

Key Features:
Create, update and delete flights.
View booking 

5. **Trips** - Admin interface for managing trip packages

Key Features:
Create, update and delete trips.
View booking 

6. **Attractions** - Admin panel for managing attractions

Key Features:
Create, update and delete attractions.
View booking 
   
## The challenge/difficulties to develop the application
Developing our project which is tourista came with several challenges, especially at the beginning. One of the biggest difficulties we faced was communication within the team. Since we were not familiar with each other, it was hard to share ideas, understand how everyone worked, and collaborate effectively.

As time went on, we worked to solve this problem by having regular team discussions, using tools to help us work together, and being open and honest in our communication. These efforts helped us build trust and improve teamwork.

In the end, we were able to work well as a team and successfully complete the project. Along the way, we also improved our skills in problem-solving and teamwork. This experience taught us how important it is to communicate, adapt, and stay determined to reach our goals.
## References

1. Athuraliya, A., & Creately. (2022, December 12). _Sequence Diagram Tutorial – Complete Guide with Examples._ Creately. https://creately.com/guides/sequence-diagram-tutorial/
2. _Car rental in Malaysia | Book a car Online - WAHDAH._ (n.d.). https://www.wahdah.my/
3. Booking.com. (n.d.). https://www.booking.com/
