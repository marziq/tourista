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

7. **Attraction Booking**:
   - Create: Enable users to book attractions by selecting desired locations,date and category       attractions.
   - Read:Display a comprehensive list of available attractions with descriptions, ratings,         operational hours, and ticket pricing.
   - Update:Allow users to modify their bookings, such as adjusting the date and or number of       participants.
   - Delete: Permit users to cancel attraction bookings only before payment is completed.
8. **Payment Integration**:
   - Online payment processing via Stripe or PayPal.
     
## Entity-Relationship Diagram (ERD)
![ERD WAD Project drawio](https://github.com/user-attachments/assets/729fa1f1-9dc7-4d6c-9b37-9d6f1bd590ce)

## Sequence Diagram
![WebApp drawio (2)](https://github.com/user-attachments/assets/dcc6dd52-4157-4a2d-bb0d-f9c1f09c4750)

## Mockup
**Home Page**

1. **Log in Page**:
2. **Sign Up Page**:
3. **Profile Page**:
4. **Flight Booking Page**:
5. **Hotel Booking Page**:
6. **Vehicle Booking Page**:
   ![Rental](https://github.com/user-attachments/assets/7e9b64b5-c0e7-45aa-b758-b1873b876cf5)

7. **Tour Packages Page**:
8. **Attraction Booking Page**:
![13](https://github.com/user-attachments/assets/d5f992e2-cf6d-4da0-89e3-7fb4b02ce384)
![14](https://github.com/user-attachments/assets/a4b79b48-ba5f-4a04-9589-dcaed26495ce)
![15](https://github.com/user-attachments/assets/b7bcc2b5-4be5-4457-845f-951174b6c162)


9. **Payment Page**:
   
## References
1. Athuraliya, A., & Creately. (2022, December 12). *Sequence Diagram Tutorial – Complete Guide with Examples.* Creately. https://creately.com/guides/sequence-diagram-tutorial/
2. *Car rental in Malaysia | Book a car Online - WAHDAH.* (n.d.). https://www.wahdah.my/

