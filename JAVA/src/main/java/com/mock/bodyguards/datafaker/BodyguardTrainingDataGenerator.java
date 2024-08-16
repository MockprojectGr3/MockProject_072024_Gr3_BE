package com.mock.bodyguards.datafaker;

import com.github.javafaker.Faker;
import com.mock.bodyguards.entity.Bodyguard;
import com.mock.bodyguards.entity.BodyguardTraining;
import com.mock.bodyguards.entity.Image;
import com.mock.bodyguards.entity.TrainingCatalog;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class BodyguardTrainingDataGenerator {
    private static final Faker  faker  = new Faker();
    private static final Random random = new Random();

    public static BodyguardTraining generateBodyguardTraining(Bodyguard bodyguard, TrainingCatalog trainingCatalog) {
        BodyguardTraining bodyguardTraining = new BodyguardTraining();
        bodyguardTraining.setBodyguard(bodyguard);
        bodyguardTraining.setTrainingCatalog(trainingCatalog);
        bodyguardTraining.setStatus(random.nextBoolean() ? "in progress" : "completed");
        bodyguardTraining.setDescription(faker.lorem().sentence());
        bodyguardTraining.setStartDay(trainingCatalog.getStartAt().minusDays(random.nextInt(5)));
        bodyguardTraining.setEndDay(bodyguardTraining.getStartDay().plusDays(random.nextInt(5)));

        // Tạo danh sách hình ảnh giả
        List<Image> images = new ArrayList<>();
        for (int i = 0; i < 3; i++) {
            images.add(ImageDataGenerator.generateImage(bodyguardTraining));
        }
        bodyguardTraining.setImages(images);

        return bodyguardTraining;
    }
}
