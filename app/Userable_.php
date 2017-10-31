hasMnyThrough  ///////////////user

  countries,categories,
    id - integer
    name - string

users//ot
    id - integer
    country_id - integer
    name - string

posts,articles,
    id - integer
    user_id - integer
    title - string

////tables
users:
   id
   name
roles:
  id
  name
roles_users
  id
  role_id
  user_id
permissions:
  id
  name
permissions_roles
  id
  role_id
  permission_id
permissions_users
  id
  user_id
  permission_id

