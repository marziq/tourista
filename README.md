# Tourista ( All-in-One booking system)

## Group Members
- **Member 1**: Ammar Haziq bin Zainal (2217763)
- **Member 2**: Nur Amira Binti Azhari (2217176)
- **Member 3**: Nik Shameera Azfareeha Binti Nik Shamlan (2213916)
- **Member 4**: Amirah Amnani binti Mohd Hushini @ Mohd Husaini (2215714)
- **Member 5**: Nur Nisa Nasuha Binti Nazri (2216458)

## Introduction

Tourista is a comprehensive web-based tour management system designed to streamline the process of planning and booking tours for customers. Developed using the Laravel framework, the system leverages modern web technologies to provide an intuitive and user-friendly interface. Tourista caters to individuals and families seeking seamless travel arrangements, combining essential features like flight, hotel, rental vehicle, tour packages, and attraction bookings into a unified platform.

The system empowers users to explore curated travel packages, customize their itineraries, and manage all aspects of their travel plans effortlessly. With a secure payment gateway integration, Tourista ensures safe and reliable financial transactions, making it the go-to platform for stress-free travel planning.

## Objectives
The primary goal of Tourista is to simplify travel planning by integrating multiple booking options into a single platform. It is designed to:

- Save users time and effort by consolidating services.
- Provide transparency with clear pricing and itinerary details.
- Offer flexibility through customizable packages.
- Ensure secure transactions and protect user data.

## Features and Functionalities
1. **User Authentication**: 
   - Create: Allow users to register by providing personal information such as username, email, and password.
   - Read: Display the user's profile and other features after the user has successfully logged in.
   - Update: Allow users to update their profile information, such as changing their email address, password, and contact details.
   - Delete: Allow users to delete or deactivate their accounts.
2. **Ratings and Reviews**: 
   - Create: Allow users to submit reviews and ratings for flights, hotels, vehicle rental, tour packages, and attraction booking after completing a service.
   - Read: Display the reviews and ratings for each service, with the average rating and the individual feedback from users.
   - Update: Allow users to edit their own reviews and ratings if they wish to provide updated feedback or correct mistakes in their initial submission.
   - Delete: Allow users to delete their own reviews.
3. **Flight Booking**:
   - Create: Allow users to book a flight by entering required details such as departure and arrival locations , travel date and passenger count.
   - Read: Display available flights schedules based on user inputs.
   - Update: Allow users to modify their flight bookings, including changing flight dates and edit passenger count.
   - Delete: Let users cancel their flight.
4. **Hotel Booking**:
   - Create: Allow users to book hotel rooms by selecting a hotel, room type, check-in and check-out dates, and the number of guests.
   - Read: Display a list of available hotels with detailed descriptions, including room types, pricing, amenities, and availability based on the selected dates.
   - Update: Allow users to modify their existing bookings by changing the check-in/out dates, room type, or number of guests, subject to availability.
   - Delete: Allow users to cancel their booking.
5. **Vehicle Rental Booking**:
   - Create: Allow users to book a vehicle by entering required details like dates, location, and preferences.
   - Read: Display vehicle listings with detailed descriptions, availability, and pricing.
   - Update: Enable users to modify bookings, such as changing dates or vehicle type.
   - Delete: Allow users to cancel bookings within the specified cancellation policy.
6. **Tour Package Booking**:
   - Create: Allow users to book a tour packages by selecting one of the packages available.
   - Read: Display a complete details about packages like the price per pax, duration and etc.
   - Update: Allow users to modify the pax for the tour packages.
   - Deleet: Allow users to cancel their booking.
7. **Attraction Booking**:
   - Create: Enable users to book attractions by selecting desired locations,date and category       attractions.
   - Read:Display a comprehensive list of available attractions with descriptions, ratings,         operational hours, and ticket pricing.
   - Update:Allow users to modify their bookings, such as adjusting the date and or number of       participants.
   - Delete: Permit users to cancel attraction bookings only before payment is completed.
8. **Payment Integration**:
   - Create: Allow users to make a payment for their options.
   - Read: Display all the details like total price that need to pay, the information of their information, and etc.
   - Update: Allows users to modify their payment details like adjusting the number of bank card.
   - Delete: Allow users to cancel the payment.
     
## Entity-Relationship Diagram (ERD)
![ERD WAD Project drawio](https://github.com/user-attachments/assets/729fa1f1-9dc7-4d6c-9b37-9d6f1bd590ce)

## Sequence Diagram
![WebApp drawio (1)](https://github.com/user-attachments/assets/28e56b3e-9c9d-43a1-aab3-de2878caace1)

## Mockup

1. **Home Page** 
   ![HOME (1)](https://github.com/user-attachments/assets/3388dada-9428-469f-a769-a289d70901d0)
   ![image](https://github.com/user-attachments/assets/64f6f092-b018-49fe-ad76-5fa39ce46000)


3. **Log in Page**:
   ![image](https://github.com/user-attachments/assets/f3f544d8-965a-4d51-b55c-bbddcd2afa25)


4. **Sign Up Page**:
   ![image](https://github.com/user-attachments/assets/eea2051c-007e-4fe3-91e1-2aa705eeb32f)


5. **Profile Page**:
   ![User Profile (1)](https://github.com/user-attachments/assets/290b79ea-b154-4bec-ad18-0005ae96065c)


6. **Flight Booking Page**:
   ![image](https://github.com/user-attachments/assets/8c4d0744-a31e-4279-aea3-7f1c1188550c)
   ![image](https://github.com/user-attachments/assets/de78a347-34c7-4a8f-bb20-80d8b491c6a9)


7. **Hotel Booking Page**:
   ![Hotel booking page 1](https://github.com/user-attachments/assets/313df16f-4b86-428d-ab92-db0d0ae1083e)
   ![Hotel (1)](https://github.com/user-attachments/assets/277d2411-c6a2-4ad4-9bac-a25d667eefc2)


8. **Vehicle Booking Page**:
   ![Rental (1)](https://github.com/user-attachments/assets/2540753a-a620-4a26-97de-b715614ce1c1)

9. **Tour Packages Page**:
  ![Tour Package 1](https://github.com/user-attachments/assets/ca35407f-8df8-47ba-ada7-35c346c55541)
![Tour Package 2](https://github.com/user-attachments/assets/8ec8c8a7-db27-4303-817f-27cbda55c944)
   
10.  **Attraction Booking Page**:
![12](https://github.com/user-attachments/assets/4763f105-99da-431d-a50d-37e04272f21e)
![13](https://github.com/user-attachments/assets/0fe02263-08dc-4ba8-b347-00ded85ecfd5)
![14](https://github.com/user-attachments/assets/9e8e6069-790b-4c05-bba0-d0078553d0a4)

11. **Payment Page**:
  ![Checkout(cart)](https://github.com/user-attachments/assets/4d1ed0f0-011d-421a-b3de-b718d6079726)



   
## References
1. Athuraliya, A., & Creately. (2022, December 12). *Sequence Diagram Tutorial – Complete Guide with Examples.* Creately. https://creately.com/guides/sequence-diagram-tutorial/
2. *Car rental in Malaysia | Book a car Online - WAHDAH.* (n.d.). https://www.wahdah.my/
3. Booking.com. (n.d.). https://www.booking.com/

