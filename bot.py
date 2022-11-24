import random 
from random import choice
import requests

session = requests.Session()


def login(email, password):
  files = {
    'u_email': (None, email),
    'u_password': (None, password),
  }
  data = session.post("http://localhost:81/demo2/projet-securite-service-web-main/signin.php", files=files)      # Changer la source pour correspondre au programme
  #print(data.text)
  print('Login ok')


def get_all_restaurants_add_review():
  data = session.get("http://localhost:81/demo2/projet-securite-service-web-main/all_restaurant.php")    # Changer la source pour correspondre au programme
  lines = data.text.split('\n')
  urls = []
  url_random = []
  for line in lines:
    if "add_review.php" in line:
      line = line.strip()
      line = line.replace('<a href="', '')
      line = line.replace('" role="button" class="btn btn-primary btn-sm">un avis ?</a>', '')
      url = 'http://localhost:81/demo2/projet-securite-service-web-main/' + line    # Changer la source pour correspondre au programme
      urls.append(url)
  url_random = random.choices(urls, k = 2)
  # print(url_random)
  return url_random

def write_review(url_random, notes, avis):
  files = {
    'r_rating': (None, notes),
    'review': (None, avis),
  }
  data = session.post(url_random, files=files)
  print('sent avis:', url_random)


def run_bot():
  login('bot@bot.com', 'azerty')
  restaurant_review_urls = get_all_restaurants_add_review()
  review = ['c`est un mauvais restaurant','Ce restaurant est incroyable,je n`ai jamais rien mangé d`aussi délicieux','Ce restaurant est très mauvais, je ne reviendrai plus','C`est le meilleur restaurant que je connaisse']

  for url_random in restaurant_review_urls:
    write_review(url_random,'1', random.choice(review))
run_bot()
