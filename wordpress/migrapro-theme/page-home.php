  <!--Для hero__image -->

  <section class="hero">
    <div class="hero__container">
        <div class="hero__content">
            <h2 class="hero__h2 h2">Миграционные услуги 
                <span>в Москве и Московской области</span>
            </h2>
            <p class="hero__desc desc">РВП, ВНЖ, гранжданство РФ: собираем полный пакет документов и ведём дело до результата. Компаниями — легальное оформление иностранных сотрудников.</p>
        </div>
        <div class="hero__image-ACF">
            <?php 
            $hero_image = get_field('hero_image');
            if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
            <?php endif; ?>
        </div>
    </div>    
  </section>
  <section class="services">
    <div class="services__container">
      <h2 class="services__h2 h2">Выберите свой путь.</h2>
      <div class="services__info">
        <ul class="services__list">
          <li class="services__item">
            <article class="services__card">
              <h3 class="services__h3 h3">Иностранным гражданам</h3>
              <h4 class="services__h4 h4">Оформляю статус себе или семье</h4>
              <p class="services__desc desc">РВП, ВНЖ, гражданство РФ. Проверим основание, соберём документы, подадим без ошибок. Не знаете, с чего начать — начните с консультации.</p>
              <div class="services__links">
                <a class="services__link btn btn-blue" href="tel:84958590051">Бесплатная консультация</a>
                <a class="services__link btn btn-transparent" href="/uslugi/">Смотреть услуги и цены</a>
              </div>
            </article>
          </li>
          <li class="services__item">
            <article class="services__card">
              <h3 class="services__h3 h3">Работодателям</h3>
              <h4 class="services__h4 h4">Оформляю иностранных сотрудников</h4>
              <p class="services__desc desc">Разрешения на работу, ВКС, кадровые уведомления в МВД. Более 10 лет в миграционном праве, работаем с компаниями Москвы и области.</p>
              <div class="services__links">
                <a class="services__link services__link-transparent666 btn btn-blue" href="/rabotodatelyam/">Решение для работодателей
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.8995 9.40078L10.8995 0.999993L2.37751 1.00011M10.8995 0.999993L1.00001 10.8995" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a> 
                <a class="services__link services__link-666 btn btn-blue" href="tel:84958590051">Бесплатная консультация</a>
                <a class="services__link services__link-666 btn btn-transparent" href="#">Смотреть услуги и цены</a>                   
              </div>
            </article>
          </li>
        </ul>
        <div class="services__offices">
          <h3>Офисы в Подольске <span>и Одинцово</span></h3>
          <p>Работаем по Москве <span>и Московской области</span></p>
        </div>
      </div>
    </div>
  </section>