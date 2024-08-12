package com.mock.bodyguards.service.impl;

import com.mock.bodyguards.datafaker.BodyguardDataGenerator;
import com.mock.bodyguards.datafaker.BodyguardTrainingDataGenerator;
import com.mock.bodyguards.datafaker.TrainingCatalogDataGenerator;
import com.mock.bodyguards.entity.Bodyguard;
import com.mock.bodyguards.entity.BodyguardTraining;
import com.mock.bodyguards.entity.TrainingCatalog;
import com.mock.bodyguards.repository.BodyguardRepository;
import com.mock.bodyguards.repository.BodyguardTrainingRepository;
import com.mock.bodyguards.repository.TrainingCatalogRepository;
import com.mock.bodyguards.service.IDataGenerationService;
import lombok.RequiredArgsConstructor;
import org.springframework.stereotype.Service;

@Service
@RequiredArgsConstructor
public class DataGenerationServiceImpl implements IDataGenerationService {

    private final BodyguardRepository       bodyguardRepository;
    private final TrainingCatalogRepository trainingCatalogRepository;
    private final BodyguardTrainingRepository bodyguardTrainingRepository;

    @Override
    public void generateAndSaveData(int numberOfRecords) {
        for (int i = 0; i < numberOfRecords; i++) {
            TrainingCatalog trainingCatalog = TrainingCatalogDataGenerator.generateTrainingCatalog();
            trainingCatalogRepository.save(trainingCatalog);

            Bodyguard bodyguard = BodyguardDataGenerator.generateBodyguard();
            bodyguardRepository.save(bodyguard);

            BodyguardTraining bodyguardTraining = BodyguardTrainingDataGenerator.generateBodyguardTraining(bodyguard, trainingCatalog);
            bodyguardTrainingRepository.save(bodyguardTraining);
        }
    }
}
