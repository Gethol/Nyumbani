
# COMPLETED API ROUTES

[Go to deployed backend](https://nyumbanibackend.herokuapp.com/)

**Properties**

 - `/properties/?`
 >Gets properties belonging to single user
- `/addProperty`
<details open>
 <summary>Request Body format</summary>
 
```json
{
        "ownerID": "2",
        "thumbnailPhoto": "test: path",
        "propertyType": "Villa",
        "propertyCounty": "Mombasa",
        "propertyPhysicalAddress": "Tempore maxime dolo",
        "propertyDescription": "Molestias culpa dolo",
        "propertyRent": "Est incidunt doloru",
        "otherImages": {
          "1": "pic1.jpg",
          "2": "pic2.jpg"
        },
        "dateBuilt": "24-12-2020",
        "videoLink": "https://youtu.be/dQw4w9WgXcQ",
        "propertySize": "15",
        "landSize": "22",
        "bedrooms": "5",
        "bathrooms": "2",
        "propertyFeatures": {
          
            "balcony":"1",
            "security":"0",
            "laundry":"0",
            "elevator":"0",
            "parking":"1"
         
        }
      }
```
  </details>

----
**Listings**

 - `/listings`
> Gets all listings
- `/listings/?`
>Gets single listing
- `listing/?`
>Gets listings belonging to specific owner

---
**Applications**

- `/applications/?`
>Gets properties belonging to single user

---
**Requests**

- `/requests/?`
>Gets all requests for a single property owner

---
**Payments**
-`/payments/getTransactions/?`
>Gets all transactions for a single property owner

-`/payments/extract/?`
>Gets transaction history for a specific property

-`/payments/summary/?`
>Get summary of transactions for a specific property owner
