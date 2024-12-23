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
   - Read: Allow users to log in using their email and password. Upon successful login, they can access their profile and other features.
   - Update: Allow users to update their profile information, such as changing their email address, password, and contact details.
   - Delete: Allow users to delete or deactivate their accounts.
2. **Ratings and Reviews**: 
   - Allow users to leave, read, and edit feedback after completing a tour, admin can remove inappropriate or spam feedback.
3. **Flight Booking**:
   - Create: Allow users to book a flight by entering required details such as departure and arrival locations , travel date and passenger count.
   - Read: Display available flights schedules based on user inputs.
   - Update: Allow users to modify their flight bookings, including changing flight dates and edit passenger count.
   - Delete: Let users cancel their flight.
4. **Hotel Booking**:
   - Create: Allow users to book hotel rooms by selecting a hotel, room type, check-in and check-out dates, and the number of guests.
   - Read: Display a list of available hotels with detailed descriptions, including room types, pricing, amenities, and availability based on the selected dates.
   - Update: Allow users to modify their existing bookings by changing the check-in/out dates, room type, or number of guests, subject to availability and booking policies.
   - Delete: Allow users with the option to cancel their bookings within a specific timeframe, adhering to the system’s cancellation policy.
5. **Vehicle Rental Booking**:
   - Create: Allow users to book a vehicle by entering required details like dates, location, and preferences.
   - Read: Display vehicle listings with detailed descriptions, availability, and pricing.
   - Update: Enable users to modify bookings, such as changing dates or vehicle type.
   - Delete: Allow users to cancel bookings within the specified cancellation policy.
6. **Tour Package Booking**:
   - Create: Allow users to book a tour packages by selecting one of the packages available
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
   - Update: Allows users to modify their payment details like adjusting the number of bank card
   - Delete: Allow users to cancel the payment
     
## Entity-Relationship Diagram (ERD)
![ERD WAD Project drawio](https://github.com/user-attachments/assets/729fa1f1-9dc7-4d6c-9b37-9d6f1bd590ce)

## Sequence Diagram
![WebApp drawio (2)](https://github.com/user-attachments/assets/dcc6dd52-4157-4a2d-bb0d-f9c1f09c4750)

## Mockup

1. **Home Page** 
   ![image](https://github.com/user-attachments/assets/7940cd52-8c01-439f-8d19-5515c097ba5f)
   ![image](https://github.com/user-attachments/assets/64f6f092-b018-49fe-ad76-5fa39ce46000)



2. **Log in Page**:
   ![image](https://github.com/user-attachments/assets/f3f544d8-965a-4d51-b55c-bbddcd2afa25)


3. **Sign Up Page**:
   ![image](https://github.com/user-attachments/assets/eea2051c-007e-4fe3-91e1-2aa705eeb32f)


4. **Profile Page**:
   ![image](https://github.com/user-attachments/assets/99bbe6e0-9476-4ba6-adca-ba8d07fa3599)


5. **Flight Booking Page**:
   ![image](https://github.com/user-attachments/assets/8c4d0744-a31e-4279-aea3-7f1c1188550c)
   ![image](https://github.com/user-attachments/assets/de78a347-34c7-4a8f-bb20-80d8b491c6a9)


6. **Hotel Booking Page**:
   ![Hotel](https://github.com/user-attachments/assets/1c14bbb0-5f93-4841-92a8-d72281902554)
   ![Hotel (1)](https://github.com/user-attachments/assets/277d2411-c6a2-4ad4-9bac-a25d667eefc2)


7. **Vehicle Booking Page**:
   ![Rental (1)](https://github.com/user-attachments/assets/2540753a-a620-4a26-97de-b715614ce1c1)

8. **Tour Packages Page**:
  ![Tour Package](https://github.com/user-attachments/assets/ad12cefd-a2aa-44cc-9aef-c45bfadeb2a6)
  ![image](https://github.com/user-attachments/assets/72efd255-49e9-4913-ab7b-bb0010aa6493)
   
9.  **Attraction Booking Page**:
![13](https://github.com/user-attachments/assets/d5f992e2-cf6d-4da0-89e3-7fb4b02ce384)
![14](https://github.com/user-attachments/assets/a4b79b48-ba5f-4a04-9589-dcaed26495ce)
![15](https://github.com/user-attachments/assets/b7bcc2b5-4be5-4457-845f-951174b6c162)


10. **Payment Page**:
    ![image](https://github.com/user-attachments/assets/90eb8efd-ad23-4163-9bc6-b64640a19e40)

   
## References
1. Athuraliya, A., & Creately. (2022, December 12). *Sequence Diagram Tutorial – Complete Guide with Examples.* Creately. https://creately.com/guides/sequence-diagram-tutorial/
2. *Car rental in Malaysia | Book a car Online - WAHDAH.* (n.d.). https://www.wahdah.my/
3. Booking.com. (n.d.). https://www.booking.com/

