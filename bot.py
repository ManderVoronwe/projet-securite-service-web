import requests

session = requests.Session()


def login(email, password):
  files = {
    'u_email': (None, email),
    'u_password': (None, password),
  }
  data = session.post("http://localhost:81/demo2/projet-securite-service-web-main/signin.php", files=files)
  #print(data.text)
  print('Login ok')


def get_all_restaurants_add_review():
  data = session.get("http://localhost:81/demo2/projet-securite-service-web-main/all_restaurant.php")
  lines = data.text.split('\n')
  urls = []
  for line in lines:
    if "add_review.php" in line:
      line = line.strip()
      line = line.replace('<a href="', '')
      line = line.replace('" role="button" class="btn btn-primary btn-sm">un avis ?</a>', '')
      url = 'http://localhost:81/demo2/projet-securite-service-web-main/' + line
      print(url)
      urls.append(url)
  return urls


def write_review(url, notes, avis):
  files = {
    'r_rating': (None, notes),
    'review': (None, avis),
  }
  data = session.post(url, files=files)
  print('sent avis:', url)


def run_bot():
  login('bot@bot.com', 'azerty')
  restaurant_review_urls = get_all_restaurants_add_review()
  for url in restaurant_review_urls:
    write_review(url, '1', 'mauvais')

run_bot()
