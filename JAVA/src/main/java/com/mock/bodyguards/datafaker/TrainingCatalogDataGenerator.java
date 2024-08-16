package com.mock.bodyguards.datafaker;

import com.github.javafaker.Faker;
import com.mock.bodyguards.entity.TrainingCatalog;

import java.time.LocalDateTime;
import java.util.Random;

public class TrainingCatalogDataGenerator {

    private static final Faker  faker  = new Faker();
    private static final Random random = new Random();

    public static TrainingCatalog generateTrainingCatalog() {
        TrainingCatalog trainingCatalog = new TrainingCatalog();
        trainingCatalog.setName(faker.book().title());
        trainingCatalog.setDuration(LocalDateTime.now().plusDays(random.nextInt(5)));
        trainingCatalog.setDescription(faker.lorem().sentence());
        trainingCatalog.setStartAt(LocalDateTime.now().plusDays(random.nextInt(30)));
        trainingCatalog.setEndAt(trainingCatalog.getStartAt().plusDays(random.nextInt(5)));
        return trainingCatalog;
    }
}
